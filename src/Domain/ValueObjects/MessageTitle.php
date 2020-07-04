<?php

namespace App\Domain\ValueObjects;

use RuntimeException;

final class MessageTitle
{
    private $title;

    public function __construct(string $title)
    {

        $this->guardVideoTitle($title);
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->title;
    }

    private function guardVideoTitle(string $title): void
    {
        if (strlen($title) < 10) {
            throw new RuntimeException('Video Title can not have less than 10 characters.');
        }
    }
}