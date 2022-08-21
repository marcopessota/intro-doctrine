<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$student = $entityManager->find(Student::class,$argv[1]); // Traz todos os dados do registro, precisa para excluir dados em cascata
// $student = $entityManager->getPartialReference(Student::class, $argv[1]); // Esse comando traz apenas o id

$entityManager->remove($student);
$entityManager->flush();