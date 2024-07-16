<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $Departements = Departement::all();
        $students = Student::all();
        return view('Layout.Views.Utama', compact('students','Departements'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'department' => 'required',
            'address' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', ' created successfully.');
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'department' => 'required',
            'address' => 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
