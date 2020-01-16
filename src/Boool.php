<?php

namespace Boool;

use Exception;

/**
 * Class Boool
 */
class Boool {

    protected array $methods;

    private string $directory = __DIR__;
    private string $methodDirectory;

    /**
     * Boool constructor.
     */
    public function __construct()
    {
        $this->loadMethods();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        if (\array_key_exists($name, $this->methods)) {
            return $this->methods[$name]->handle($arguments[0]);
        }

        throw new \RuntimeException($name . ' is not a known method.');
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($name, $arguments)
    {
        $boool = new Boool();

        if (\array_key_exists($name, $boool->methods)) {
            return $boool->methods[$name]->handle($arguments[0]);
        }

        throw new \RuntimeException($name . ' is not a known method.');
    }

    public function loadMethods()
    {
        $this->methodDirectory = $this->directory . '/Methods/';

        $methodFolder = opendir($this->methodDirectory);

        while (($file = readdir($methodFolder)) !== false) {
            if (filetype($this->methodDirectory . $file) === 'file') {
                $name = \substr($file, 0, -4);
                $classname = 'Boool\\Methods\\' . $name;
                $this->methods[(string) $name] = new $classname();
            }
        }
        closedir($methodFolder);
    }

}
