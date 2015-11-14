<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 20:22
 */
use Entity\Service;

$app->get('/services', function() use ($entityManager){
    $services = $entityManager->getRepository("Entity\\Service")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $services));
});
$app->get('/services/:id', function($id) use ($entityManager){
    $services = $entityManager->find("Entity\\Service", $id);
    if($services !== null)
        echo json_encode($services);
});
