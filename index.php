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

$app->get('/categories', function() use ($entityManager){
    $categories = $entityManager->getRepository("Entity\\Categorie")->findAll();
    echo json_encode($categories);
    //echo json_encode(print_r($categories));
});

$app->get('/categories/:id', function($id) use ($entityManager){
    $categories = $entityManager->find("Entity\\Categorie", $id);

    if($categories !== null)
        echo json_encode($categories);
});

$app->get('/users/:id', function($id) use ($entityManager){
    $users = $entityManager->find("Entity\\User", $id);

    if($users !== null)
        echo json_encode($users);
});

$app->get('/users', function() use ($entityManager){
    $users = $entityManager->getRepository("Entity\\User")->findAll();
    echo json_encode($users);
});

//include("src/Modules/Categories.php");//Categories
//include("src/Modules/Etats.php");//Etats
//include("src/Modules/Users.php");//Users
//include("src/Modules/Produits.php");//Produits

$app->run();