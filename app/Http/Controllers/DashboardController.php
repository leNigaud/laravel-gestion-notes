<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate the average grade of all students
        $averageGrade = DB::table('student_subject')->avg('note');

        // Count the number of students with an average grade < 10
        $nonAdmissibleCount = Student::with('subjects')
            ->get()
            ->filter(function ($student) {
                $average = $student->subjects->avg('pivot.note');
                return $average < 10;
            })
            ->count();

        // Get the total number of students
        $totalStudents = Student::count();

        // Get the total number of subjects
        $totalSubjects = Subject::count();

        // Fetch all students with their subjects and grades
        $students = Student::with(['subjects' => function ($query) {
            $query->select('subjects.id', 'name', 'note');
        }])->get();

        $subjects = Subject::all();
        
        return view('dashboard', compact(
            'averageGrade',
            'nonAdmissibleCount',
            'totalStudents',
            'totalSubjects',
            'students',
            'subjects'
        ));
    }
}

