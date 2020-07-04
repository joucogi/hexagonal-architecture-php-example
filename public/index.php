<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Controllers\OutputController;
use App\Infrastructure\Factories\OutputFactory;
use Dotenv\Dotenv;

try {
    // Load environmemt vars
    $dotenv = Dotenv::createImmutable('../');
    $dotenv->load();

    $id    = (int)$_GET['id'];
    $title = $_GET['title'];

    // Instance output method
    $outputMethod  = ucfirst(getenv('OUTPUT_METHOD'));
    $outputFactory = '\App\Infrastructure\Factories\\' . $outputMethod . 'OutputFactory';
    $output        = $outputFactory::build();

    // Run controller
    $controller = new OutputController($output);
    $controller($id, $title);
} catch (Exception $e) {
    echo $e->getMessage();
}
