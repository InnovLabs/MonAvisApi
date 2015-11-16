<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:55
 */
use Entity\Categorie;

$app->get('/categories', function() use ($entityManager){
    $categories = $entityManager->getRepository("Entity\\Categorie")->findBy(array(), array('libelle' => 'ASC'));
    echo json_encode(array("ReturnCode" => 1,"Data" => $categories));
});

$app->get('/categories/:id', function($id) use ($entityManager){
    $categories = $entityManager->find("Entity\\Categorie", $id);

    if($categories !== null)
        echo json_encode($categories);
});