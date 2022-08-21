<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $key => $student) {
    echo "ID: $student->id\nNome: $student->name\n";
    echo implode(',', $student->phones()->map(fn (Phone $phone) => $phone->number)->toArray());
    echo "\n\n";
}

// var_dump($studentRepository->findOneBy(["name" => "Marco Pessota"]));

// echo $studentRepository->count([]);