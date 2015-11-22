<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 20:22
 */
use Entity\Service;

$app->get('/services', function() use ($entityManager){
    $services = $entityManager->getRepository("Entity\\Service")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $services));
});
$app->get('/services/:id', function($id) use ($entityManager){
    $services = $entityManager->find("Entity\\Service", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $services));
});
$app->get('/services/entreprise/:id', function($id) use ($entityManager){
    $services = $entityManager->getRepository("Entity\\Service")->findBy(array('entreprise' => $id));
    echo json_encode(array("ReturnCode" => 1,"Data" => $services));
});
$app->get('/services/note/:id', function($id) use ($entityManager){
    $compteAvis = 1;
    $avgRanking = 0;
    $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('service'=> $id));
    if(null !== $avis and count($avis)){
        $compteAvis = count($avis);
        foreach($avis as $unAvis){
            $avgRanking += $unAvis->getRanking();
        }
    }

    echo json_encode(array("ReturnCode" => 1,"Data" =>  round(($avgRanking/$compteAvis),2)));
});
/*************POST*************/
$app->post('/service', function() use ($app,$entityManager){
    $service = new Service();
    hydrate($service,$app);
    $entityManager->persist($service);
    $entityManager->flush();
    echo json_encode(array("ReturnCode" => 1,"Data" => "Service ajouté !"));//compter les résultats
});

