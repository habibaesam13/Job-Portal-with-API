<?php

namespace App\Http\Controllers;

use App\Models\seeker;
use Illuminate\Http\Request;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    //view seeker profile
    public function show($id)
    {
        $seekerData=seeker::findOrFail($id);
        return response()->json($seekerData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Find the seeker by ID
    $seeker = Seeker::findOrFail($id);

    // Validate incoming request data
    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'skills' => 'nullable|string',
        'experience' => 'nullable|string',
        'personalImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB image
        'resume' => 'nullable|mimes:pdf,doc,docx|max:5120', // Max 5MB PDF/DOC
    ]);

    // Handle personal image upload
    if ($request->hasFile('personalImage')) {
        // Delete old image if exists
        if ($seeker->personalImage && file_exists(public_path('images/seekers/' . $seeker->personalImage))) {
            unlink(public_path('images/seekers/' . $seeker->personalImage));
        }

        // Save new image
        $imageName = time() . '.' . $request->personalImage->extension();
        $request->personalImage->move(public_path('images/seekers'), $imageName);
        $seeker->personalImage = $imageName;
    }

    // Handle resume upload
    if ($request->hasFile('resume')) {
        // Delete old resume if exists
        if ($seeker->resume && file_exists(public_path('resumes/' . $seeker->resume))) {
            unlink(public_path('resumes/' . $seeker->resume));
        }

        // Save new resume
        $resumeName = time() . '.' . $request->resume->extension();
        $request->resume->move(public_path('resumes'), $resumeName);
        $seeker->resume = $resumeName;
    }

    // Update seeker details
    $seeker->update([
        'name' => $request->name ?? $seeker->name,
        'skills' => $request->skills ?? $seeker->skills,
        'resume' => $seeker->resume ?? null,
        'personalImage' => $seeker->personalImage ?? 'default.jpg',
        'experience' => $request->experience ?? $seeker->experience,
    ]);

    // Return success response with updated timestamp
    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully',
        'data' => [
            'id' => $seeker->id,
            'name' => $seeker->name,
            'skills' => $seeker->skills,
            'experience' => $seeker->experience,
            'personalImage' => asset('images/seekers/' . $seeker->personalImage),
            'resume' => $seeker->resume ? asset('resumes/' . $seeker->resume) : null,
            'updated_at' => $seeker->updated_at->format('Y-m-d H:i:s'),
        ]
    ]);
    
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(seeker $seeker)
    {
        //
    }
}
