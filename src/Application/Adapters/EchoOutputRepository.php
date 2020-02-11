<?php namespace App\Application\Adapters;

use App\Domain\Interfaces\OutputRepository;
use App\Domain\Video;

class EchoOutputRepository implements OutputRepository
{
    public function print(Video $video)
    {
        echo $video->getId() . ' .- ' . $video->getTitle();
    }
}