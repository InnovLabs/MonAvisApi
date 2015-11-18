<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 20:15
 */

$app->get('/entreprises', function() use ($entityManager){
    $entreprises = $entityManager->getRepository("Entity\\Entreprise")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/:id', function($id) use ($entityManager){
    $entreprises = $entityManager->find("Entity\\Entreprise", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/categorie/:id', function($idCategorie) use ($entityManager){
    $entreprises = $entityManager->getRepository("Entity\\Entreprise")
                                 ->findBy(array('categorie' => $idCategorie));

    if(null !== $entreprises){
        foreach($entreprises as $e){
            $compteAvis = 1;
            $somRanking = 0;
            $services = $entityManager->getRepository("Entity\\Service")->findBy(array('entreprise' => $e->getId()));
            if(null !== $services){
                foreach($services as $unService){
                    $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('service'=> $unService->getId()));
                    if(null !== $avis and count($avis)){
                        $compteAvis = count($avis);
                        foreach($avis as $unAvis){
                            $somRanking += $unAvis->getRanking();
                        }
                    }
                }
            }

            $e->setRanking(round(($somRanking/$compteAvis),2));
        }
    }

    echo json_encode(array("ReturnCode" => 1,"Data" => $entreprises));
});
$app->get('/entreprises/notes/:id', function($idEntreprise) use ($entityManager){
    $compteAvis = 1;
    $avgRanking = 0;
    $services = $entityManager->getRepository("Entity\\Service")->findBy(array('entreprise' => $idEntreprise));
    if(null !== $services){
        foreach($services as $unService){
            $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('service'=> $unService->getId()));
            if(null !== $avis and count($avis)){
                $compteAvis = count($avis);
                foreach($avis as $unAvis){
                    $avgRanking += $unAvis->getRanking();
                }
            }
        }
    }
    echo json_encode(array("ReturnCode" => 1,"Data" => round(($avgRanking/$compteAvis),2)));
});

