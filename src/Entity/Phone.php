<?php 

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
Class Phone
{
    #[Id, GeneratedValue, Column]
    public int $id;
    #[Column]
    public string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }
}