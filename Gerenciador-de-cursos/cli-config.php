<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManagerFactory = new EntityManagerCreator();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
