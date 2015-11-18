<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:14
 */
use Entity\User;
use Entity\Avis;
use Entity\ReputationUser;

$app->get('/users', function() use ($entityManager){
    $users = $entityManager->getRepository("Entity\\User")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});
$app->get('/users/:id', function($id) use ($entityManager){
    $users = $entityManager->find("Entity\\User", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});
$app->get('/users/:id/reputation/like/:id2', function($idUser, $valLike) use ($entityManager){
    $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('user'=>$idUser));//Selectionner les avis by User
    foreach($avis as $unAvis){
        $reputationUser = $entityManager->getRepository("Entity\\ReputationUser")->findBy(array('like' => $valLike, 'avis'=> $unAvis->getId()));//like = 0?
    }
     echo json_encode(array("ReturnCode" => 1,"Data" => count($reputationUser)));//compter les résultats
});

