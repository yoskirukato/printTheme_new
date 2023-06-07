<?php

function autoload_сlass($name) {
    if (strpos($name, 'App') === false) {
        return false;
    }

    $name = str_replace('\\', '/', $name);
    $filename = $name.'.php';

    $path = __DIR__ . "/$filename";
    if (file_exists($path)) {
        include_once $path;
    }

    return true;
}

spl_autoload_register("autoload_сlass");