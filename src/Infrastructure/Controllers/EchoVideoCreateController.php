<?php

namespace App\Infrastructure\Controllers;

use App\Application\Services\VideoCreate;
use App\Application\Adapters\EchoOutputRepository;

final class EchoVideoCreateController
{
    function __invoke($id, $title)
    {
        $output = new EchoOutputRepository();

        $videoCreate = new VideoCreate($output);
        $videoCreate($id, $title);
    }
}