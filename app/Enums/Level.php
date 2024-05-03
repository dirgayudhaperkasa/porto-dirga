<?php

namespace App\Enums;
use Spatie\LaravelOptions\Options;

enum Level:int
{
    case Beginner = 1;
    case Intermediate = 2;
    case Pro = 3;
}

Options::forEnum(Level::class)->toArray();


