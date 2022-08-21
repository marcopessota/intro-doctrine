<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

// $student = $entityManager->find(Student::class, $argv[1]); // Outra forma de manipulação
$student = $studentRepository->find($argv[1]);
$student->name = $argv[2];

$entityManager->flush();