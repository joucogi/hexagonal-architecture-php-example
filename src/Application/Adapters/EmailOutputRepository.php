<?php namespace App\Application\Adapters;

use App\Domain\Interfaces\OutputRepository;
use App\Domain\Video;

class EmailOutputRepository implements OutputRepository
{
    private $to;
    private $subject;

    public function __construct($to, $subject)
    {
        $this->to = $to;
        $this->subject = $subject;
    }

    public function print(Video $video)
    {
        $body = $video->getId() . ' .- ' . $video->getTitle();

        mail($this->to,$this->subject,$body);
    }
}