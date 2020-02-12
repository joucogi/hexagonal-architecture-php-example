<?php namespace App\Infrastructure\Adapters;

use App\Domain\Interfaces\OutputRepository;
use App\Domain\Entities\Video;

class FileOutputRepository implements OutputRepository
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function print(Video $video)
    {
        $body = sprintf("%s --> %s.- %s\n", date('Y-m-d H:i:s'), $video->getId(), $video->getTitle());

        file_put_contents($this->filename, $body, FILE_APPEND);
    }
}