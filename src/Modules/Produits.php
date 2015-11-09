<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:11
 */

use Entity\Produit;

$app->get('/produits', function() use ($entityManager){
    $produits = $entityManager->getRepository("Entity\\Produit")->findAll();

//    $id = 1;
//    $categories = $entityManager->getRepository("Entity\\Categorie")->find($id);
//
//    if (null === $categories) {
//        throw new Exception("L'annonce d'id ".$id." n'existe pas.");
//    }
//
//    $listApplications = $entityManager
//        ->getRepository('Entity\\Produit')
//        ->findBy(array('categorie' => $categories));

    echo json_encode($produits);
});

$app->get('/produits/:id', function($id = 1) use ($entityManager){
    $produit = $entityManager->find("Entity\\Produit", $id);

    if($produit !== null)
        echo json_encode($produit);
});

$app->post('/produits/:libelle', function($libelle) use ($entityManager){
    $produit = new Produit();

    if(empty($libelle)){
        echo "libelle vide";
        return;
    }

    $produit->setLibelle($libelle);
    $produit->setPrix(100);
    $entityManager->persist($produit);
    $entityManager->flush();

    $produits = $entityManager->getRepository("Entity\\Produit")->findAll();
    echo json_encode((array)$produits);
});

