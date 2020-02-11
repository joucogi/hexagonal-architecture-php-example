<?php

require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;

use App\Infrastructure\FileVideoCreateController;
use App\Infrastructure\EmailVideoCreateController;
use App\Infrastructure\EchoVideoCreateController;

try
{
    // Load environmemt vars
    $dotenv = Dotenv::createImmutable('../');
    $dotenv->load();

    $id = intval($_GET['id']);
    $title = $_GET['title'];

    // Instance controller
    switch (getenv('OUTPUT_METHOD')) {
        case 'email':

            $to = getenv('EMAIL_TO');
            $subject = getenv('EMAIL_SUBJECT');
            $controller = new EmailVideoCreateController($to, $subject);

        break;

        case 'file':

            $filename = __DIR__ . '/../logs/' . getenv('FILE_FILENAME');
            $controller = new FileVideoCreateController($filename);

        break;

        case 'echo':

            $controller = new EchoVideoCreateController();
        
        break;

        default:

            throw new Exception('Incorrect output');

        break;
    }

    // Run controller
    $controller($id, $title);
}
catch (Exception $e)
{
    echo $e->getMessage();
}
