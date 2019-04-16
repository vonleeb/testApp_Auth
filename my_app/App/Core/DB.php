<?php

namespace App\Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class DB
{
    private $entityManager;

    public function __construct()
    {
        $paths = array(PATH . "App/Entities");
        $isDevMode = true;
        $dbParams = require_once PATH . 'config/config.php';
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    public function getManager()
    {
        return $this->entityManager;
    }

}
