<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "description",
        "salary",
        "employer_id",
        "category_id",
        "status"
    ];
    // Define the relationship: One job belongs to one category
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employerId');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
    
}
