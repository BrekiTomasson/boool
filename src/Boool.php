<?php

declare(strict_types=1);

namespace Boool;

use Boool\Exceptions\NotAnArray;

class Boool
{
    protected array $methods = [];

    private string $directory = __DIR__;

    protected static Boool $instance;

    private function __construct()
    {
        // We don't want anybody else to be able to instantiate this class, as all methods are run statically
        // through the magic method below.
    }

    public static function __callStatic(string $name, array $arguments): bool
    {
        if (! is_array($arguments[0])) {
            throw new NotAnArray('Input must be an array.');
        }

        return self::getInstance()->getMethod($name)?->handle(...$arguments);
    }

    public static function getInstance(): Boool
    {
        if (empty(self::$instance)) {
            self::$instance = new Boool();
            self::$instance->loadMethods();
        }

        return self::$instance;
    }

    public static function register(string $name, CommonMethods $class): void
    {
        $instance = self::getInstance();
        $instance->methods[$name] = get_class($class);
    }

    public function loadMethods(): void
    {
        $methodDirectory = $this->directory . '/Methods/';

        $methodFolder = opendir($methodDirectory);

        while (($file = readdir($methodFolder)) !== false) {
            if (filetype($methodDirectory . $file) === 'file') {
                $classname = 'Boool\\Methods\\' . substr($file, 0, -4);
                $class = new $classname();

                if (method_exists($class, 'registerSelf')) {
                    $class->registerSelf();
                }
            }
        }
        closedir($methodFolder);
    }

    protected function caseInsensitiveLookup(string $methodName): bool|string
    {
        foreach ($this->methods as $key => $class) {
            if (strtolower($methodName) === strtolower($key)) {
                return $class;
            }
        }

        return false;
    }

    /** @return mixed|void */
    protected function getMethod(string $methodName)
    {
        $lookup = $this->caseInsensitiveLookup($methodName);

        if ($lookup) {
            return new $lookup;
        }

        echo 'nothing found';
    }
}
