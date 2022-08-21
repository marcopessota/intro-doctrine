<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
Class Student
{
    #[Id, GeneratedValue, Column]
    public int $id;
    #[Column]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}