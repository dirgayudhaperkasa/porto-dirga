<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Level;
use Spatie\LaravelOptions\Options;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'SkillName',
        'Level',
        'Description',
        'StartDate'
    ];

    protected $casts = [
        'Level'=> Level::class,
    ];
}
