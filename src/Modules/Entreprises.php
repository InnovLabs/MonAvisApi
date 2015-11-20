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
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/:id', function($id) use ($entityManager){
    $entreprises = $entityManager->find("Entity\\Entreprise", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->post('/entreprises/add/', function() use ($entityManager){

});
