<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:14
 */
use Entity\User;

$app->get('/users/:id', function($id) use ($entityManager){
    $users = $entityManager->find("Entity\\User", $id);

    if($users !== null)
        echo json_encode($users);
});

$app->get('/users', function() use ($entityManager){
    $users = $entityManager->getRepository("Entity\\User")->findAll();
    echo json_encode($users);
});
