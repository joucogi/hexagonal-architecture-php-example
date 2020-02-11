<?php

namespace App\Domain\ValueObjects;

use Exception;

final class VideoTitle
{
    private $title;

    public function __construct(String $title) {

        $this->guardVideoTitle($title);
        $this->title = $title;
    }

    private function guardVideoTitle(String $title)
    {
        if (strlen($title) < 10)
        {
            throw new Exception('Video Title can not have less than 10 characters.');
        }
    }

    public function __toString() { return $this->title; }
}