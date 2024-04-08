<?php
/** Configuration for: Error Reporting **/
error_reporting(E_ALL);
ini_set("display_errors", 1);

/** Configuration for: URL **/
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . '/');
/* define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER); */

/** Configuration For Database. **/
/* define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'dsrcohc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_CHARSET', 'utf8'); */

/** Configuration For Globals. **/
define('CONTROLLER_SUFFIX', 'Controller');
define('MODEL_SUFFIX', 'Model');
define('DEFAULT_CONTROLLER', 'home');
define('ERROR_CONTROLLER', 'error');

/** Configuration for Loading Modules. **/
define('AUTOLOAD_MODULES', 'core, helper, lib');
?>
