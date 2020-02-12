<?php namespace App\Infrastructure\Adapters;

use App\Domain\Interfaces\OutputRepository;
use App\Domain\Entities\Video;

class EchoOutputRepository implements OutputRepository
{
    public function print(Video $video)
    {
        echo $video->getId() . ' .- ' . $video->getTitle();
    }
}