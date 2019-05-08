<?php
use Controller\PagesController;
use Controller\UsersController;
use Model\Users;

return [
    Users::class => function ($container) {
        $host = $container['config']['database']['host'];
        $driver = $container['config']['database']['driver'];
        $name = $container['config']['database']['name'];
        $user = $container['config']['database']['user'];
        $password = $container['config']['database']['password'];

        return new Users($driver, $host, $name, $user, $password);
    },
    UserController::class => function ($container) {
        $userModel = $container[Users::class]($container);
        
        return new UsersController($userModel);
    },
    PagesController::class => function ($container) {
        return new PagesController();
    }
];
