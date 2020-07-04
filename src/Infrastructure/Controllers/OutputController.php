<?php

namespace App\Infrastructure\Controllers;

use App\Application\Services\OutputMessage;
use App\Domain\Interfaces\Output;

final class OutputController
{
    private $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function __invoke($id, $title): void
    {
        $outputMessage = new OutputMessage($this->output);
        $outputMessage($id, $title);
    }
}