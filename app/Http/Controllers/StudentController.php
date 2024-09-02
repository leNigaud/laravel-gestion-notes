<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Student::create(["name" => "Rabe"]);
        // Student::create([
            //     ["name" => "Rasoa"],
            //     ["name" => "Rabe"],
            //     ["name" => "John Doe"]
            // ]);
            
        // $subject = new Subject();
        // $subject->name = "Anglais";
        // $subject->save();

        // $ss = Student::all();
        // $student = Student::find(1);
        // $student->subjects()->updateExistingPivot(1, ['note' => 3]);

        // dd($student->subjects[0]->pivot->note);

        return view('students');
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
            'name' => 'required|string|max:255',
        ]);

        // Create a new student
        $student = new Student();
        $student->name = $request->name;
        $student->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student has been added successfully.');
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
