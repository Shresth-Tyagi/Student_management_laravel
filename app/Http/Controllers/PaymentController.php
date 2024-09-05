<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Payment;
use App\Models\Cource;
use App\Models\Enrollment;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::all();
        return view ('payments.index')->with('payments', $payments);
      
    }

  
    public function create(): View
    {
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.create', compact('enrollments'));
    }


    public function store(Request $request): RedirectResponse
    {
    
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'payment Addedd!');
    }


    public function show($id): View
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
       
    }

   

    public function edit($id): View
    {
        $payments = Payment::find($id);
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.edit', compact('payments', $enrollments));
       
    }

   

    public function update(Request $request, $id): RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'payment Updated!');  

    }

    
    public function destroy($id)
    {
        $payments = Payment::find($id);
        $payments->delete();
        return redirect('payments')->with('flash_message', 'payments deleted!');  
    
    }
}
