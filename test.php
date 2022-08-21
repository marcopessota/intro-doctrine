<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
use Alura\Doctrine\Helper\EntityManagerCreator;

require 'vendor/autoload.php';

$entityManager = new EntityManagerCreator();

var_dump($entityManager);
