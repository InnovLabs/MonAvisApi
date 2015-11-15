<?php
/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 10:36
 */



require 'vendor/autoload.php';
require_once 'bootstrap.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->contentType('application/json;charset=utf-8');

include("src/Modules/Categories.php");//Categories
include("src/Modules/Etats.php");//Etats
include("src/Modules/Users.php");//Users

$app->run();