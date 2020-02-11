<?php

namespace App\Application;

use App\Domain\Video;
use App\Domain\ValueObjects\VideoId;
use App\Domain\ValueObjects\VideoTitle;
use App\Domain\Interfaces\OutputRepository;

final class VideoCreate
{
    private $output;

    function __construct(OutputRepository $output)
    {
        $this->output = $output;
    }

    function __invoke(int $id, String $title)
    {  
        $video = new Video(new VideoId($id), new VideoTitle($title));

        $this->output->print($video);
    }
}