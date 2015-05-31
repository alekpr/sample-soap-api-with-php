<?php
ini_set('display_errors', 'On');
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);


/* Load the composer autoloader into your application. */
$classloader = require_once "vendor/autoload.php";
$classloader->addPsr4('Libs\\MyClass\\', __DIR__."/libs/classes");
use Slim\Slim;

define("BASE_DIR", __DIR__."/");

/* Load all constant */
require_once BASE_DIR."libs/const/const.php";

/* Create Slim instance */
$app = new Slim();