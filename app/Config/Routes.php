<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('menu', [], function ($routes) {
    $routes->get('', 'MenuController::index');
    $routes->get('ajouter', 'MenuController::ajouter');
    $routes->post('store', 'MenuController::store');
    $routes->post('getmenus', 'MenuController::getMenus', ['as' => 'getmenus']);
    $routes->get('edit/(:num)', 'MenuController::edit/$1', ['as' => 'menus.edit']);
    $routes->post('update', 'MenuController::update', ['as' => 'menus.update']);
});

$routes->group('table', [], function ($routes) {
    $routes->get('', 'TableController::index');
    $routes->get('ajouter', 'TableController::ajouter');
    $routes->post('store', 'TableController::store');
    $routes->post('gettables', 'TableController::getMenus', ['as' => 'gettables']);
    $routes->get('edit/(:num)', 'TableController::edit/$1', ['as' => 'tables.edit']);
    $routes->post('update', 'TableController::update', ['as' => 'tables.update']);
});

$routes->group('groupe', [], function ($routes) {
    $routes->get('', 'GroupeController::index');
    $routes->get('ajouter', 'GroupeController::ajouter');
    $routes->post('store', 'GroupeController::store', ['as' => 'storegroupe']);
    $routes->post('getgroupes', 'GroupeController::getGroupes', ['as' => 'getgroupes']);
    $routes->get('edit/(:num)', 'GroupeController::edit/$1', ['as' => 'groupes.edit']);
    $routes->post('update', 'GroupeController::update', ['as' => 'groupes.update']);
});