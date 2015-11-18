<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 20:15
 */
use Entity\Entreprise;
use Entity\Service;
use Entity\Avis;

$app->get('/entreprises', function() use ($entityManager){
    $entreprises = $entityManager->getRepository("Entity\\Entreprise")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/:id', function($id) use ($entityManager){
    $entreprises = $entityManager->find("Entity\\Entreprise", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/:id/note', function($idEntreprise) use ($entityManager){
    $avgRanking = 0;
    $compteAvis = 1;
    $entreprises = $entityManager->find("Entity\\Entreprise", $idEntreprise);
    $services = $entityManager->getRepository("Entity\\Service")->findBy(array('entreprise' => $idEntreprise));
    if(null !== $services){//S'il ya des services liés à l'entrerpise
        foreach($services as $unService){
            $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('service'=>$unService->getId()));
            if(null !== $avis and count($avis)) {//On verifie que le nombre d'avis est superieur à 0
                $compteAvis = count($avis);
                foreach($avis as $unAvis){
                    $avgRanking += $unAvis->getRanking();//Somme des rankings
                }
            }
        }
    }
    echo json_encode(array("ReturnCode" => 1,"Data" => round(($avgRanking/$compteAvis),2)));//calcul de la moyenne ranking (2 chiffres après la virgule)
});