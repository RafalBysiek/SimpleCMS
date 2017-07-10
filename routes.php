<?php 

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->post('names', 'controllers/add-name.php');
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
$router->get('login', 'LoginController@showLogin');
$router->post('login', 'LoginController@processLogin');
$router->get('add_company', 'PagesController@add_company');
$router->post('add_company', 'PagesController@add_company');
$router->get('logout', 'LoginController@logout');