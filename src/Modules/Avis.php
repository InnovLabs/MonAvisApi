<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 14/11/2015
 * Time: 05:51
 */

$app->get('/avis', function() use ($entityManager){
    $avis = $entityManager->getRepository("Entity\\Avis")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $avis));
});

$app->get('/avis/ByUserAndService/:id/:id2', function($idUser,$idService) use ($entityManager){
    $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('user'=> $idUser,'service'=>$idService));
    echo json_encode(array("ReturnCode" => 1,"Data" => $avis));
});
