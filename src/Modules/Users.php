<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:14
 */
use Entity\User;

$app->get('/users', function() use ($entityManager){
    $users = $entityManager->getRepository("Entity\\User")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});
$app->get('/users/:id', function($id) use ($entityManager){
    $users = $entityManager->find("Entity\\User", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});

