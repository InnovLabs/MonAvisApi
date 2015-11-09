<?php
/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 23:53
 */

require 'vendor/autoload.php';
require_once 'bootstrap.php';

$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = $entityManager->getMetadataFactory()->getAllMetadata();
//$schemaTool->createSchema($classes);
$schemaTool->updateSchema($classes);