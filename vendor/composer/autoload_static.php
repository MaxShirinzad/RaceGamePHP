<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit36145ca66c9f3cb8b3cbd7de72c2b2c4
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit36145ca66c9f3cb8b3cbd7de72c2b2c4::$classMap;

        }, null, ClassLoader::class);
    }
}