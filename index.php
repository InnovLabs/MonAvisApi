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
include("src/Modules/Entreprises.php");//Entreprises
include("src/Modules/Services.php");//Services
include("src/Modules/Avis.php");//Avis
include("src/Modules/Commentaire.php");//Commentaires
include("src/Modules/ReputationUser.php");//ReputationUser
include("src/Modules/Fonctions.php");//fonction d'hydratation pour les POST ET PUT

$app->run();