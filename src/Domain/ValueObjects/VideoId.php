<?php

namespace App\Domain\ValueObjects;

use Exception;

final class VideoId
{
    private $id;

    public function __construct(int $id) {

        $this->guardVideoId($id);
        $this->id = $id;
    }

    private function guardVideoId(int $id)
    {
        if ($id < 1)
        {
            throw new Exception('Video Id can not be negative or zero');
        }
    }

    public function __toString() { return strval($this->id); }
}