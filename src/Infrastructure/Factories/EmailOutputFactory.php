<?php

namespace App\Infrastructure\Factories;

use App\Domain\Interfaces\Output;
use App\Domain\Interfaces\OutputFactory;
use App\Infrastructure\Adapters\EmailOutput;

class EmailOutputFactory implements OutputFactory
{
    public static function build(): Output
    {
        $to      = getenv('EMAIL_TO');
        $subject = getenv('EMAIL_SUBJECT');
        return new EmailOutput($to, $subject);
    }
}