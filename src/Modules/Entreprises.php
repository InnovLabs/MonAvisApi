<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 20:15
 */
use Entity\Entreprise;

$app->get('/entreprises', function() use ($entityManager){
    $entreprises = $entityManager->getRepository("Entity\\Entreprise")->findAll();
    if($entreprises !== null)
       echo json_encode($entreprises);
        //echo print_r($entreprises);
});
$app->get('/entreprises/:id', function($id) use ($entityManager){
    $entreprises = $entityManager->find("Entity\\Entreprise", $id);

    if($entreprises !== null)
        echo json_encode($entreprises);
});
$app->post('/entreprises/add/', function() use ($ressource,$entityManager){
//    $entrepriseToAdd =  $ressource->post('Entity\Entreprise');
//    $entityManager->persist($entrepriseToAdd);
//    $entityManager->flush();
//    echo json_encode(array("ReturnCode" => 1,"Data" => "ok"));
    echo "good";
});
