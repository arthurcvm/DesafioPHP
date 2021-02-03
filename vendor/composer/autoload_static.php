<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54ec9c3624ac476740735a3a879c69b4
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit54ec9c3624ac476740735a3a879c69b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54ec9c3624ac476740735a3a879c69b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54ec9c3624ac476740735a3a879c69b4::$classMap;

        }, null, ClassLoader::class);
    }
}