<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\Output;
use App\Domain\Interfaces\OutputFactory;
use App\Infrastructure\Adapters\FileOutput;

class FileOutputFactory implements OutputFactory
{
    public static function build(): Output
    {
        $filename = __DIR__ . '/../../../logs/' . getenv('FILE_FILENAME');
        return new FileOutput($filename);
    }
}