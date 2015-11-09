<?php
/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 18:57
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__."/src/Entity");

$isDevMode = true;

// the connection configuration
//$dbParams = array(
//    'host'     => 'bd01.cloud4africa.net',
//    'driver'   => 'pdo_mysql',
//    'user'     => 'c580_willy',
//    'password' => '100%Jesus!',
//    'dbname'   => 'c580_test',
//);

$dbParams = array(
    'host'     => 'localhost',
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'monavis_db',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$driver = new \Doctrine\Common\Persistence\Mapping\Driver\StaticPHPDriver(__DIR__."/src/Entity");
$entityManager->getConfiguration()->setMetadataDriverImpl($driver);

