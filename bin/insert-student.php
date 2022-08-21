<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();

$entityManager->persist(new Student($argv[1]));
$entityManager->flush();