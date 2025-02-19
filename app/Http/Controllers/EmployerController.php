<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Employer::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employerData=Employer::findOrFail($id);
        return response()->json($employerData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }


    public function createJob(Request $request, $employerId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string',
            'categoryId' => 'required|exists:categories,id',
            'status' => 'required|in:open,closed',
        ]);

        $employer = Employer::findOrFail($employerId);

        $job = $employer->jobs()->create([
            'title' => $request->title,
            'description' => $request->description,
            'employer_id'=>$employerId,
            'category_id' => $request->categoryId,
            'salary' => $request->salary,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job created successfully',
            'data' => $job
        ], 201);
    }
}
