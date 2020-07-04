<?php

namespace App\Domain\ValueObjects;

use RuntimeException;

final class MessageId
{
    private $id;

    public function __construct(int $id)
    {
        $this->guardVideoId($id);
        $this->id = $id;
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    private function guardVideoId(int $id): void
    {
        if ($id < 1) {
            throw new RuntimeException('Video Id can not be negative or zero');
        }
    }
}