<?php

namespace App\Infrastructure;

use App\Application\VideoCreate;
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