<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Cource;
use Illuminate\View\View;

class CourceController extends Controller
{
    public function index(): View
    {
        $cources = Cource::all();
        return view ('cources.index')->with('cources', $cources);
      
    }

  
    public function create()
    {
        return view('cources.create');
    }


    public function store(Request $request): RedirectResponse
    {
    
        $input = $request->all();
        Cource::create($input);
        return redirect('cources')->with('flash_message', 'cource Addedd!');
    }


    public function show($id): View
    {
        $cources = Cource::find($id);
        return view('cources.show')->with('cources', $cources);
       
    }

   

    public function edit($id): View
    {
        $cources = Cource::find($id);
        return view('cources.edit')->with('cources', $cources);
       
    }

   

    public function update(Request $request, $id): RedirectResponse
    {
        $cources = Cource::find($id);
        $input = $request->all();
        $cources->update($input);
        return redirect('cources')->with('flash_message', 'cource Updated!');  

    }

    
    public function destroy($id)
    {
        $cources = Cource::find($id);
        $cources->delete();
        return redirect('cources')->with('flash_message', 'cource deleted!');  
    
    }
}
