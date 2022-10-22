<?php

declare(strict_types=1);

namespace Boool;

use Boool\Exceptions\NotAnArray;

/**
 * @method static bool All(array $array) Alias of AllTrue()
 * @method static bool AllFalse(array $array)                                        Returns true if array contains only false entries.
 * @method static bool AllTrue(array $array)                                         Returns true if array contains only true entries.
 * @method static bool AmountFalse(array $array, int $integer) Alias of CountFalse()
 * @method static bool AmountTrue(array $array, int $integer) Alias of CountTrue()
 * @method static bool Any(array $array) Alias of AnyTrue()
 * @method static bool AnyFalse(array $array)                                        Returns true if array contains at least one false entry.
 * @method static bool AnyTrue(array $array)                                         Returns true if array contains at least one true entry.
 * @method static bool AtLeastFalse(array $array, int $integer)                      Returns true if array contains $integer or more false.
 * @method static bool AtLeastHalfFalse(array $array)                                Returns true if array contains half or more false entries.
 * @method static bool AtLeastHalfTrue(array $array)                                 Returns true if array contains half or more true entries.
 * @method static bool AtLeastTrue(array $array, int $integer)                       Returns true if array contains $integer or more true.
 * @method static bool ContainsFalse(array $array) Alias of AnyFalse()
 * @method static bool ContainsTrue(array $array) Alias of AnyTrue()
 * @method static bool CountFalse(array $array, int $integer)                        Returns true if array contains exactly $integer false.
 * @method static bool CountTrue(array $array, int $integer)                         Returns true if array contains exactly $integer true.
 * @method static bool EverythingFalse(array $array) Alias of AllFalse()
 * @method static bool EverythingTrue(array $array) Alias of AllTrue()
 * @method static bool Half(array $array)                                            Returns true if array contains exactly 50% true and 50% false values.
 * @method static bool HalfFalse(array $array) Alias of Half()
 * @method static bool HalfTrue(array $array) Alias of Half()
 * @method static bool HasFalse(array $array) Alias of AnyFalse()
 * @method static bool HasTrue(array $array) Alias of AnyTrue()
 * @method static bool Most(array $array) Alias of MostlyTrue()
 * @method static bool MostlyFalse(array $array)                                     Returns true if array contains more than half false values.
 * @method static bool MostlyTrue(array $array)                                      Returns true if array contains more than half true values.
 * @method static bool NoFalse(array $array) Alias of AllTrue()
 * @method static bool NoTrue(array $array) Alias of AllFalse()
 * @method static bool OnlyFalse(array $array) Alias of AllFalse()
 * @method static bool OnlyTrue(array $array) Alias of AllTrue()
 */
final class Boool
{
    protected array $methods = [];

    private string $directory = __DIR__;

    protected static Boool $instance;

    private function __construct()
    {
        // We don't want anybody else to be able to instantiate this class.
        // All methods are run statically using __callStatic().
    }

    public static function __callStatic(string $name, array $arguments): bool
    {
        if (! is_array($arguments[0])) {
            throw new NotAnArray('Input must be an array.');
        }

        return self::getInstance()->getMethod($name)?->handle($arguments);
    }

    public static function register(string $name, CommonMethod $class): void
    {
        $instance = self::getInstance();
        $instance->methods[$name] = get_class($class);
    }

    protected static function getInstance(): Boool
    {
        if (empty(self::$instance)) {
            self::$instance = new Boool();
            self::$instance->loadMethods();
        }

        return self::$instance;
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
            return new $lookup();
        }

        echo 'nothing found';
    }

    protected function loadMethods(): void
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
}
