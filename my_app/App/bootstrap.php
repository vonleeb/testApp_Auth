<?php


namespace App;

use App\Core\Route;

define('PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);

spl_autoload_register(function ($class) {

    $path = explode('\\', $class);
    $path = implode(DIRECTORY_SEPARATOR, $path);
    $path = PATH . $path . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        throw new \Exception('File is not find: ' . $path);
    }
});




Route::start();
