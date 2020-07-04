<?php

namespace App\Domain\Interfaces;

interface OutputFactory
{
    public static function build(): Output;
}