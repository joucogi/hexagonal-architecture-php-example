<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\MessageId;
use App\Domain\ValueObjects\MessageTitle;

final class Message
{
    private $id;
    private $title;

    public function __construct(MessageId $id, MessageTitle $title)
    {
        $this->id    = $id;
        $this->title = $title;
    }

    public function getId(): MessageId
    {
        return $this->id;
    }

    public function getTitle(): MessageTitle
    {
        return $this->title;
    }
}