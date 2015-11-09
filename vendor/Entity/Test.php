<?php

/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 14:58
 */
namespace Entity;

class Test extends \Spot\Entity
{
    protected static $table = 'test';
    protected static $mapper = 'Entity\Mapper\Test';

    public static function fields()
    {
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'libelle'        => ['type' => 'string', 'required' => true],
//            'body'         => ['type' => 'text', 'required' => true],
//            'status'       => ['type' => 'integer', 'default' => 0, 'index' => true],
//            'author_id'    => ['type' => 'integer', 'required' => true],
//            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }
}