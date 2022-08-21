<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
Class Student
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(targetEntity: Phone::class, mappedBy:"student")]
    private Collection $phones;

    #[Column]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
    }
    
    function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    /** @return Collection<Phone> */
    function phones()
    {
        return $this->phones;
    }
}