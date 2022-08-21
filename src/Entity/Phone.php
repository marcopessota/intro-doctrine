<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
Class Phone
{
    #[Id, GeneratedValue, Column]
    public int $id;
    
    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    public Student $student;

    #[Column]
    public string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function setStudent(Student $student)
    {
        $this->student = $student;
    }
}