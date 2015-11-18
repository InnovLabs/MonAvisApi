<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 17:48
 */
$app->get('/etats', function() use ($entityManager){
    $etats = $entityManager->getRepository("Entity\\Etat")->findAll();
    echo json_encode($etats);
});
$app->get('/etats/:id', function($id) use ($entityManager){
    $etats = $entityManager->find("Entity\\User", $id);

    if($etats !== null)
        echo json_encode($etats);
});

