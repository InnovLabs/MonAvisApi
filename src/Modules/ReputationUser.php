<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 17/11/2015
 * Time: 20:50
 */
$app->get('/reputations/user/:id', function($idUser) use ($entityManager){
    $reputationUser = $entityManager->getRepository("Entity\\ReputationUser")->findBy(array('user' => $idUser));
    echo json_encode(array("ReturnCode" => 1,"Data" => $reputationUser));
});
//$app->get('/reputation/user/like', function() use ($entityManager){
//    $reputationUser = $entityManager->getRepository("Entity\\ReputationUser")->findBy(array('like' =>));
//    //print_r(($reputationUser->leng));
//    echo json_encode(array("ReturnCode" => 1,"Data" => count($reputationUser)));
//});