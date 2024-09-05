<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Batch;
use App\Models\Cource;
use Illuminate\View\View;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::all();
        return view ('batches.index')->with('batches', $batches);
      
    }

  
    public function create(): View
    {
        $cources = Cource::pluck('name','id');
        return view('batches.create', compact('cources'));
    }


    public function store(Request $request): RedirectResponse
    {
    
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message', 'batch Addedd!');
    }


    public function show($id): View
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches', $batches);
       
    }

   

    public function edit($id): View
    {
        $batches = Batch::find($id);
        return view('batches.edit')->with('batches', $batches);
       
    }

   

    public function update(Request $request, $id): RedirectResponse
    {
        $batches = Batch::find($id);
        $input = $request->all();
        $batches->update($input);
        return redirect('batches')->with('flash_message', 'batch Updated!');  

    }

    
    public function destroy($id)
    {
        $batches = Batch::find($id);
        $batches->delete();
        return redirect('batches')->with('flash_message', 'batch deleted!');  
    
    }
}
