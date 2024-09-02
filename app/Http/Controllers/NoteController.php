<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $subjects = Subject::all();

        return view('notes', compact('students', 'subjects'));
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
    // Validate the request
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject_id' => 'required|exists:subjects,id',
        'grade' => 'required|numeric|min:0|max:20',
    ]);

    // Retrieve the student
    $student = Student::find($request->student_id);

    // Check if there's already a note for the given student and subject
    $existingNote = $student->subjects()->where('subject_id', $request->subject_id)->first();

    if ($existingNote) {
        // If there's an existing note, update it
        $student->subjects()->updateExistingPivot($request->subject_id, ['note' => $request->grade]);
        $message = 'Note has been updated successfully.';
    } else {
        // If there's no existing note, create a new one
        $student->subjects()->attach($request->subject_id, ['note' => $request->grade]);
        $message = 'Note has been added successfully.';
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', $message);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

