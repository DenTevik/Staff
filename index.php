<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
const BASE_PATH = __DIR__.'/';

// Autoload
spl_autoload_register(function($className)
{
    $namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);
    $class=BASE_PATH."/".(empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
});

include_once(BASE_PATH . 'inc/functions.php');
include_once(BASE_PATH . 'inc/routes.php');
include_once(BASE_PATH . 'inc/controller.php');
include_once(BASE_PATH . 'inc/render.php');
include_once(BASE_PATH . 'core/DataBase.php');


$route = $_GET['main_route'] ?? "";
$attributes = [];
foreach ($_GET as $key => $value) {
    if ($key != 'main_route') {
        $attributes[$key] = $value;
    }
}
new Routes($route, $attributes);
