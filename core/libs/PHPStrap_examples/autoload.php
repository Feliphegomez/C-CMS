<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('CORE_PATH', dirname(dirname(dirname(__DIR__ . '/../')."../")."../"));

spl_autoload_register(function($className){
    $namespace = str_replace("\\","/", __NAMESPACE__);
    $className = str_replace("\\","/", $className);
    $class = CORE_PATH."/libs/".(empty($namespace)?"":$namespace."/")."{$className}.php";
	require_once($class);
});
