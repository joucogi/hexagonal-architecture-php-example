<?php namespace App\Domain\Interfaces;

use App\Domain\Entities\Video;

interface OutputRepository {

    public function print(Video $video);
}