<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
     // Define the relationship: One category has many jobs
     public function jobs()
     {
         return $this->hasMany(Job::class);
     }
}
