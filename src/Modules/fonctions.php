<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 22/11/2015
 * Time: 23:07
 */
function hydrate($object,$app){
    $body = $app->request->getBody();
    $data = json_decode($body);
    $data = (array)$data;//Convertir les données JSOn en tableau
    $keys = array_keys($data);//Stocker les clés du tableau
    $values = array_values($data);//stocker les valeurs correspondants aux clé
    for($i = 0; $i < count($keys); $i++){
        $methodSet = 'set' . ucfirst($keys[$i]);
        if (method_exists($object, $methodSet)) {
            $object->{$methodSet}($values[$i]);
        }
    }
}