<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 11/11/2015
 * Time: 06:14
 */

class Ressource{
    public function post($entityToPost){

        $app = \Slim\Slim::getInstance();
        $entity = new $entityToPost();
        $params = $app->request()->params();

        foreach ($app->request()->params() as $param => $value) {
            $methodSet = 'set' . ucfirst($param);
            if (method_exists($entity, $methodSet)) {
                $entity->{$methodSet}($value);
            } else {
                $entity->{$param} = $value;
            }
        };
        return $entity;
    }
}