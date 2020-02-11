<?php namespace App\Domain\Interfaces;

use App\Domain\Video;

interface OutputRepository {

    public function print(Video $video);
}