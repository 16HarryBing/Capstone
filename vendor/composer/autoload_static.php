<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54a5f7e77ebccbd51fdd61dc0b442f10
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54a5f7e77ebccbd51fdd61dc0b442f10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54a5f7e77ebccbd51fdd61dc0b442f10::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54a5f7e77ebccbd51fdd61dc0b442f10::$classMap;

        }, null, ClassLoader::class);
    }
}