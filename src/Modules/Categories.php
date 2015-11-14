<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:55
 */
use Entity\Categorie;
include("Ressource.class.php");//fichier gérant la logique POST
$ressource = new Ressource();//création d'un Resource gérer la methode POST

$app->get('/categories', function() use ($entityManager){
    $categories = $entityManager->getRepository("Entity\\Categorie")->findAll();
    if(null !== $categories)
    echo json_encode(array("ReturnCode" => 1,"Data" => $categories));
    //echo json_encode(print_r($categories));
});

$app->get('/categories/:id', function($id) use ($entityManager){
    $categories = $entityManager->find("Entity\\Categorie", $id);
    if($categories !== null)
        echo json_encode(array("ReturnCode" => 1,"Data" => $categories));
});


$app->post('/categories/add/', function() use ($ressource,$entityManager){
    $categorieToAdd =  $ressource->post('Entity\Categorie');
    $entityManager->persist($categorieToAdd);
    $entityManager->flush();
    echo 'succès !';
});