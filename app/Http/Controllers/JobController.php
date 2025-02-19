<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $jobs->load(['employer', 'category']);
        return response()->json($jobs);
    }

}
