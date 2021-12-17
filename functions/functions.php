<?php 

function redirect_to($path) {
    header('Location: ' . $path);
}

function h($string) {
    return htmlspecialchars($string);
}

function my_autoload($class_name) {
    if(preg_match('//', $class_name)) {
        require_once 'classes/' . $class_name . '.php';
    }
}

spl_autoload_register('my_autoload');