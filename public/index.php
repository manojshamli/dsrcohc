<?php
session_start();
// Set a constant that holds the project's folder path, like "/var/www/<PROJECT_FOLDER>".
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// Load Application Config
require APP . '/config/config.php';

// Automatically Load Autoload Files from: <PROJECT_FOLDER>/application/<core & helper>
if (file_exists(ROOT . URL_PUBLIC_FOLDER . DIRECTORY_SEPARATOR . 'autoload.php')) {
    require ROOT . URL_PUBLIC_FOLDER . DIRECTORY_SEPARATOR . 'autoload.php';
    $loader = new Autoloader();
    $loader->__autoload();
}

// start the application
new Application();
?>
