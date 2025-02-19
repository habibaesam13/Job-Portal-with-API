<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'companyName',
        'companyLocation',
        'companyWebsite'
    ];
     // Define the relationship: One employer has many jobs
     public function jobs()
     {
         return $this->hasMany(Job::class, 'employer_id'); // Fix FK relation
     }
}
