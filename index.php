<?php

// FRONT COTROLLER

// 1. Seting

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. includes

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

// 4. Router call

$router = new Router();
$router->run();
