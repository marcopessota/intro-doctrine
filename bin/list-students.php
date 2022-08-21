<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $key => $student) {
    echo "ID: $student->id\nNome: $student->name\n";
    if ($student->phones()->count() > 0) {
        echo PHP_EOL;
        echo "Telefones\n";
        echo implode(',', $student->phones()->map(fn (Phone $phone) => $phone->number)->toArray());
    }
    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Cursos\n";
        echo implode(',', $student->courses()->map(fn (Course $course) => $course->name)->toArray());
    }
    echo PHP_EOL.PHP_EOL;
}

// var_dump($studentRepository->findOneBy(["name" => "Marco Pessota"]));

// echo $studentRepository->count([]);