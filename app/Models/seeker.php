<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seeker extends Model
{
    /** @use HasFactory<\Database\Factories\SeekerFactory> */
    use HasFactory;
    protected $fillable=[
        'name',
        'skills',
        'resume',
        'personalImage',
        'experience'
    ];
}
