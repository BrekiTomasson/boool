<?php

namespace Boool;

use Exception;

/**
 * Class Boool
 */
class Boool {

    protected static Boool $instance;
    protected array $methods;

    private string $directory = __DIR__;
    private string $methodDirectory;

    /**
     * Boool constructor.
     */
    private function __construct()
    {
        // Blocks others from newing up this class.
    }

    /**
     * @return Boool
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Boool();
            self::$instance->methods = [];
            self::$instance->loadMethods();
        }

        return self::$instance;
    }

    /**
     * @param string        $name
     * @param CommonMethods $class
     */
    public static function register(string $name, CommonMethods $class) : void
    {
        $instance = self::getInstance();
        $instance->methods[$name] = get_class($class);
    }

    public function loadMethods()
    {
        $this->methodDirectory = $this->directory . '/Methods/';

        $methodFolder = opendir($this->methodDirectory);

        while (($file = readdir($methodFolder)) !== false) {
            if (filetype($this->methodDirectory . $file) === 'file') {
                $classname = 'Boool\\Methods\\' . substr($file, 0, -4);
                $class = new $classname();

                if (method_exists($class, 'registerSelf')) {
                    $class->registerSelf();
                }
            }
        }
        closedir($methodFolder);
    }

    /**
     * @param string $methodName
     *
     * @return mixed
     */
    protected function getMethod(string $methodName)
    {
        $lookup = $this->caseInsensitiveLookup($methodName);
        if ($lookup) {
            return new $lookup;
        }
        echo 'nothing found';
    }

    /**
     * @param string $methodName
     *
     * @return bool|string
     */
    protected function caseInsensitiveLookup(string $methodName)
    {
        foreach ($this->methods as $key => $class) {
            if (strtolower($methodName) === strtolower($key)) {
                return $class;
            }
        }
        return false;
    }

    public function test(string $method, array $array) : bool
    {
        $worker = $this->getMethod($method);

        return $worker->handle($array);
    }

}
