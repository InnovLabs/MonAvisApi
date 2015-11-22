<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 16:14
 */
use Entity\User;


/********GET*********/
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

/*****POST*****/
$app->post('/user', function() use ($app,$entityManager){
//    $body = $app->request->getBody();
//    $data = explode('=', $body);
//    $json = json_decode(urldecode($data[1]));
//
//    $data = json_decode($body);
    $user = new User();
    hydrate($user,$app);
//    $user->setNom($json->nom);
//    $user->setPrenoms($json->prenom);
//    $user->setPhoto($json->photo);
//    $user->setMail($json->email);
//    $user->setIdCompte($json->idCompte);
//    var_dump($user);

//    $user = new User();//$body->nom
//    $user->setNom($data->nom);
//    $user->setPrenoms($data->prenom);
//    $user->setPhoto($data->photo);
//    $user->setMail($data->email);
//    $user->setIdCompte($data->idCompte);
    $entityManager->persist($user);
    $entityManager->flush();

    echo json_encode(array("ReturnCode" => 1,"Data" => "Utilisateur ajouté !"));//compter les résultats
});

/**********PUT************/
$app->put('/user', function() use ($app,$entityManager){
    $body = $app->request->getBody();
    $data  = json_decode($body);
    $user = $entityManager->find("Entity\\User", $data->id);
    hydrate($user,$app);
    $entityManager->merge($user);
    $entityManager->flush();
    echo "Modifié avec succès !";
});
$app->put('/user/:id', function($id) use ($app,$entityManager){
    $user = $entityManager->find("Entity\\User", $id);
    hydrate($user,$app);
    $entityManager->merge($user);
    $entityManager->flush();
    echo "Modifié avec succès !";
});

/********DELETE********/
$app->delete('/user/remove/:id', function($idUser) use ($app,$entityManager){
    $user = $entityManager->find("Entity\\User", $idUser);
    $entityManager->remove($user);
    $entityManager->flush();
    echo "Supprimé avec succès !";
});

