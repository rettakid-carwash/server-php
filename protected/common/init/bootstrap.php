<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array($PROJ_PERSISTANCE_ENTITY_ROOT), $isDevMode);

$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'PACS',
    'user'     => 'root',
    'password' =>  'asaneb17'
);

$entityManager = EntityManager::create($conn, $config);

?>