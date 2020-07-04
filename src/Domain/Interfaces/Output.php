<?php
namespace App\Domain\Interfaces;

use App\Domain\Entities\Message;

interface Output
{
    public function print(Message $video): void;
}