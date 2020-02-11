<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\VideoId;
use App\Domain\ValueObjects\VideoTitle;

final class Video
{
    private $id;
    private $title;

    function getId(): VideoId { return $this->id; }
    function getTitle(): VideoTitle { return $this->title; }

    function __construct(VideoId $id, VideoTitle $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}