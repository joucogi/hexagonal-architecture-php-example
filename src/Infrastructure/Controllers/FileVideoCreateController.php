<?php

namespace App\Infrastructure\Controllers;

use App\Application\Services\VideoCreate;
use App\Infrastructure\Adapters\FileOutputRepository;

final class FileVideoCreateController
{
    private $filename;

    function __construct(String $filename)
    {
        $this->filename = $filename;
    }

    function __invoke($id, $title)
    {
        $output = new FileOutputRepository($this->filename);

        $videoCreate = new VideoCreate($output);
        $videoCreate($id, $title);
    }
}