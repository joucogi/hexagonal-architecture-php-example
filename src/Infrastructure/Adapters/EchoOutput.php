<?php
namespace App\Infrastructure\Adapters;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Output;

class EchoOutput implements Output
{
    public function print(Message $video): void
    {
        echo $video->getId() . ' .- ' . $video->getTitle();
    }
}