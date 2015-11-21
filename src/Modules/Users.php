<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:14
 */

$app->get('/users', function() use ($entityManager){
    $users = $entityManager->getRepository("Entity\\User")->findAll();
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});

$app->get('/users/:id', function($id) use ($entityManager){
    $users = $entityManager->find("Entity\\User", $id);
    echo json_encode(array("ReturnCode" => 1,"Data" => $users));
});
$app->get('/users/reputations/:id', function($idUser) use ($entityManager){
    $nbrelike = 0;
    $nbreUnLike = 0;
    $avis = $entityManager->getRepository("Entity\\Avis")->findBy(array('user'=>$idUser));//Selectionner les avis by User
    if(null !== $avis and count($avis)){
        foreach($avis as $unAvis){
            $avisLike = $entityManager->getRepository("Entity\\ReputationUser")->findBy(array('like' => 1,'unLike' => 0, 'avis'=> $unAvis->getId()));//like = 1?
            $nbrelike += count($avisLike);
            $avisUnLike = $entityManager->getRepository("Entity\\ReputationUser")->findBy(array('like' => 0,'unLike' => 1, 'avis'=> $unAvis->getId()));//like = 0?
            $nbreUnLike += count($avisUnLike);
        }
    }
    echo json_encode(array("ReturnCode" => 1,"Data" => $nbrelike-$nbreUnLike));//compter les résultats
});

$app->post('/user', function() use ($app){
    $body = $app->request->getBody();
//    $data = explode('=', $body);
//    $json = json_decode(urldecode($data[1]));
//
//    $user = new User();
//    $user->setNom($json->nom);
//    $user->setPrenoms($json->prenoms);
//    var_dump($user);

    $data = json_decode($body);
    //$body->nom
    var_dump($data);
});

