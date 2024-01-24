<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function getChildren($id) {

    $db = db_connect();

    $builder = $db->table('menus');

    $found = $builder
                    ->select('menus.*')
                    ->where('menus.parent_id', $id)
                    ->get()->getResult();

    //dd($db->getLastQuery());

    return $found;
}

function getTables($id) {

    $db = db_connect();

    $builder = $db->table('tables');

    $found = $builder
                    ->select('tables.*')
                    ->join('menus', 'tables.menus_id = menus.id')
                    ->where('menus.id', $id)
                    ->get()->getResult();

    return $found;
}
