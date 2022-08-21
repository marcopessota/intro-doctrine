<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $key => $student) {
    echo "ID: $student->id\nNome: $student->name\n";
    if (count($student->phones()) > 0 ) {
        echo "Telefones:\n";
        foreach ($student->phones() as $phone) {
            echo "  $phone->number\n\n";
        }
    }
}

// var_dump($studentRepository->findOneBy(["name" => "Marco Pessota"]));

// echo $studentRepository->count([]);