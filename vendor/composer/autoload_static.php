<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite84b1596007af5ceb56786cf55a3e8a9
{
    public static $classMap = array (
        'App\\Controllers\\LoginController' => __DIR__ . '/../..' . '/controllers/LoginController.php',
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/controllers/PagesController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/controllers/Add_companyController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'App\\Core\\ViewResolver' => __DIR__ . '/../..' . '/core/ViewResolver.php',
        'App\\Dto\\User' => __DIR__ . '/../..' . '/dto/User.php',
        'App\\Repository\\UsersRepository' => __DIR__ . '/../..' . '/repository/UsersRepository.php',
        'App\\Repository\\UsersRepositoryImpl' => __DIR__ . '/../..' . '/repository/UsersRepositoryImpl.php',
        'App\\Service\\LoginService' => __DIR__ . '/../..' . '/service/LoginService.php',
        'App\\Service\\RegistrationService' => __DIR__ . '/../..' . '/service/RegistrationService.php',
        'ComposerAutoloaderInite84b1596007af5ceb56786cf55a3e8a9' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInite84b1596007af5ceb56786cf55a3e8a9' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite84b1596007af5ceb56786cf55a3e8a9::$classMap;

        }, null, ClassLoader::class);
    }
}
