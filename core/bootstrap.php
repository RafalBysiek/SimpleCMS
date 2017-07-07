<?php

use App\Core\App;

use App\Core\ViewResolver;

App::bind('config', require 'config.php');

$config = App::get('config');

$pdo = Connection::make($config['database']);

App::bind('database', new QueryBuilder($pdo));

App::bind('viewResolver', new ViewResolver('views/', '_view.php'));

