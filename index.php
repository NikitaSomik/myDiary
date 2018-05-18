<?php 


spl_autoload_register(function($class_name){
	require_once('libs/'.$class_name.'.php');
});
require_once('libs/config.php');


Session::init();

$route = new Route;