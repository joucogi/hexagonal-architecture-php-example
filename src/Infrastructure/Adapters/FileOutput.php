<?php
namespace App\Infrastructure\Adapters;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Output;

class FileOutput implements Output
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function print(Message $video): void
    {
        $body = sprintf("%s --> %s.- %s\n", date('Y-m-d H:i:s'), $video->getId(), $video->getTitle());

        file_put_contents($this->filename, $body, FILE_APPEND);
    }
}