<?php

namespace App\Application\Services;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Output;
use App\Domain\ValueObjects\MessageId;
use App\Domain\ValueObjects\MessageTitle;

final class OutputMessage
{
    private $output;

    function __construct(Output $output)
    {
        $this->output = $output;
    }

    function __invoke(int $id, string $title)
    {
        $message = new Message(
            new MessageId($id),
            new MessageTitle($title)
        );

        $this->output->print($message);
    }
}