<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9ad64ba615b281b5dcb45d1c2f23ad6f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9ad64ba615b281b5dcb45d1c2f23ad6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9ad64ba615b281b5dcb45d1c2f23ad6f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9ad64ba615b281b5dcb45d1c2f23ad6f::$classMap;

        }, null, ClassLoader::class);
    }
}