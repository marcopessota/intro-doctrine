<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
Class Course
{
    #[Id, GeneratedValue, Column]
    public int $id;
    
    #[ManyToMany(Student::class, mappedBy: "courses")]
    public Collection $students;

    #[Column]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->students = new ArrayCollection();
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student)) return;

        $this->students->add($student);
        $student->enrollInCourse($this);
    }

    /** @return Collection<Student> */
    public function students()
    {
        return $this->students;
    }
}