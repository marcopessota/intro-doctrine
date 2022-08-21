<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course($argv[1]);
$entityManager->persist($course);

$entityManager->flush();