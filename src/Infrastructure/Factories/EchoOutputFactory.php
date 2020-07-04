<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\Output;
use App\Domain\Interfaces\OutputFactory;
use App\Infrastructure\Adapters\EchoOutput;

class EchoOutputFactory implements OutputFactory
{
    public static function build(): Output
    {
        return new EchoOutput();
    }
}