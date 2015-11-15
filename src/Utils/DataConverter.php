<?php
/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 01/09/2015
 * Time: 11:46
 */

namespace Utils;


class DataConverter
{
    public function convertToJson($object){
        /*approch by using object methods*/
        $class = get_class($object);
        $json = array();
        $methods = get_class_methods($class);
        $plength = count($methods);
        $json = array();
        for($i=0;$i<$plength;$i++){
            if(stripos($methods[$i], "get")!==FALSE){
                $property = strtolower(mb_substr($methods[$i], 3,mb_strlen($methods[$i],'UTF-8'),'UTF-8'));
                $setter = "set".mb_substr($methods[$i], 3,mb_strlen($methods[$i],'UTF-8'),'UTF-8');
                if(method_exists($object,$setter)){
                    //$json[$property] = $object->$methods[$i]();
                    $json[$property] = utf8_encode($object->$methods[$i]());
                }

            }
        }

        return $json;
    }

}