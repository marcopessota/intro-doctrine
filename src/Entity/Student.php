<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
Class Student
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(targetEntity: Phone::class, mappedBy:"student", cascade:["persist", "remove"])]
    private Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "students")]
    private Collection $courses;

    #[Column]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }
    
    function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course)) return;

        $this->courses->add($course);
        $course->addStudent($this);
    }

    /** @return Collection<Phone> */
    function phones()
    {
        return $this->phones;
    }

    /** @return Collection<Course> */
    function courses()
    {
        return $this->courses;
    }
}