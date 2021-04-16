<?php

namespace App\Http\Controllers;

use App\Stud;
use Illuminate\Http\Request;

class StudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studs = Stud::latest()->paginate(5);
  
        return view('studs.index',compact('studs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('studs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'stud_id' => 'required',
            'stud_name' => 'required',
            'prog_code' => 'required',
        ]);
  
        Stud::create($request->all());
   
        return redirect()->route('studs.index')
                        ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stud  $stud
     * @return \Illuminate\Http\Response
     */
    public function show(Stud $stud)
    {
        return view('studs.show',compact('stud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stud  $stud
     * @return \Illuminate\Http\Response
     */
    public function edit(Stud $stud)
    {
        //
        return view('studs.edit',compact('stud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stud  $stud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stud $stud)
    {
        //
        $request->validate([
            'stud_id' => 'required',
            'stud_name' => 'required',
            'prog_code' => 'required',
        ]);
  
        $stud->update($request->all());
  
        return redirect()->route('studs.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stud  $stud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stud $stud)
    {
        //
        $stud->delete();
  
        return redirect()->route('studs.index')
                        ->with('success','Deleted successfully');
    }
}
