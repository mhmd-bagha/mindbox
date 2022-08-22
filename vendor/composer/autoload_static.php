<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit300dd64db4b653f9eb4513136d95e401
{
    public static $files = array (
        'edc7e7f45390f932d4dcdafad6fce97e' => __DIR__ . '/../..' . '/core/Model.php',
        'dd1c6b19e38162d43c2f51b303b2f0a8' => __DIR__ . '/../..' . '/core/Controller.php',
        '70cd01a23c879c90625c555329143bae' => __DIR__ . '/../..' . '/core/App.php',
        '9ca144b2cf4b8e14294b18f449d5fe95' => __DIR__ . '/../..' . '/core/config.php',
        'b91ad166301d49b024af90b43d9545cd' => __DIR__ . '/../..' . '/public/jdf/jdf.php',
        'b9ae1ba55223bc655cd3c23923c12c63' => __DIR__ . '/../..' . '/controller/Response.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit300dd64db4b653f9eb4513136d95e401::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit300dd64db4b653f9eb4513136d95e401::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit300dd64db4b653f9eb4513136d95e401::$classMap;

        }, null, ClassLoader::class);
    }
}
