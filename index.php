<?php

require 'vendor/autoload.php';

require 'core/bootstrap.php';

use App\Core\{Router, Request};

//Router::load('routes.php')
//	->direct(Request::uri(), Request::method());


use App\Core\App;
use App\Repository\UsersRepositoryImpl;
use App\Dto\User;

$config = App::get('config');

$pdo = Connection::make($config['database']);

$usersRepository = new UsersRepositoryImpl($pdo);

$user = new User('example', 'password');

$userRegistered = $usersRepository->validateEmailAndPassword($user);

var_dump($userRegistered);