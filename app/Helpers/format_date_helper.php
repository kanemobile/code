<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if (!function_exists('dateToMySQL')) {

    function dateToMySQL($date, $separator) {
        if (!empty($date)) {
            $tabDate = explode($separator, $date);
            $date = $tabDate[2] . '-' . $tabDate[1] . '-' . $tabDate[0];

            return date('Y-m-d', strtotime($date));
        } else {
            return null;
        }
    }

}

if (!function_exists('dateFormat')) {

    function dateFormat($format = 'd-m-Y', $givenDate = null) {
        return date($format, strtotime($givenDate));
    }

}
