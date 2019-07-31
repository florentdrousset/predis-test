<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b6a71ffb9e1d60e85cc83c8a97c4792
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b6a71ffb9e1d60e85cc83c8a97c4792::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b6a71ffb9e1d60e85cc83c8a97c4792::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
