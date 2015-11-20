<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 16/11/2015
 * Time: 18:59
 */
$app->get('/commentaires', function() use ($entityManager){
    $commentaires = $entityManager->getRepository("Entity\\Commentaire")->findBy(array(), array('dateCreation' => 'DESC'));
    echo json_encode(array("ReturnCode" => 1,"Data" => $commentaires));
});

$app->get('/commentaires/:id', function($id) use ($entityManager){
    $commentaires = $entityManager->find("Entity\\Commentaire", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $commentaires));
});
