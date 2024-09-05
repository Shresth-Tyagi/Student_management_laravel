<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::all();
        return view ('student.index')->with('students', $students);
      
    }

  
    public function create()
    {
        return view('student.create');
    }


    public function store(Request $request): RedirectResponse
    {
    
        $input = $request->all();
        student::create($input);
        return redirect('students')->with('flash_message', 'Student Addedd!');
    }


    public function show($id): View
    {
        $students = Student::find($id);
        return view('student.show')->with('students', $students);
       
    }

   

    public function edit($id): View
    {
        $students = Student::find($id);
        return view('student.edit')->with('students', $students);
       
    }

   

    public function update(Request $request, $id): RedirectResponse
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'student Updated!');  

    }

    
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('students')->with('flash_message', 'Student deleted!');  
    
    }
}
