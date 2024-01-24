<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('menu', ['filter' => 'login'], function ($routes) {
    $routes->get('', 'MenuController::index');
    $routes->get('ajouter', 'MenuController::ajouter');
    $routes->post('store', 'MenuController::store');
    $routes->post('getmenus', 'MenuController::getMenus', ['as' => 'getmenus']);
    $routes->get('edit/(:num)', 'MenuController::edit/$1', ['as' => 'menus.edit']);
    $routes->post('update', 'MenuController::update', ['as' => 'menus.update']);
});
