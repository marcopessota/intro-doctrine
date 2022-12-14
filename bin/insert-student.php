<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);
$entityManager->persist($student);

if(!empty($argv[2])) $student->addPhone(new Phone($argv[2]));

$entityManager->flush();