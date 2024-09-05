<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;  
use Illuminate\View\View;

class EnrollmentController extends Controller
{
   

    public function index(): View
    {
        $enrollments = Enrollment::all();
        return view ('enrollments.index')->with('enrollments', $enrollments);
     
    }

   
    public function create()
    {
      
        return view('enrollments.create');
    }


    public function store(Request $request): RedirectResponse
    {
      
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'teacher Addedd!');
    }


    public function show($id): View
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
      
    }

    
    public function edit($id): View
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments', $enrollments);
       
    }

    
    public function update(Request $request, $id): RedirectResponse
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        return redirect('enrollments')->with('flash_message', 'enrollment Updated!');  

    }


    public function destroy($id)
    {
        $enrollments = Enrollment::find($id);
        $enrollments->delete();
        return redirect('enrollments')->with('flash_message', 'enrollment deleted!');  
    
    }
}
