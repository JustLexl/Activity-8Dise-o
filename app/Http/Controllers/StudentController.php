<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $students = Student::all(); 

        return view('students.index', compact('students')); 
    } 

    
    public function create()
    {
         return view('students.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  $validatedData = $request->validate([ 
    'picture' => 'required',  
    'first_name' => 'required|max:75', 
    'last_name' => 'required|max:75', 
    'description' => 'required', 
  ]); 
  Student::create($validatedData); 

  return redirect('/student')->with('success', 'Student is successfully saved'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id); 

        return view('students.show', compact('student')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'picture' => 'required',  
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'description' => 'required',
        ]);

        Student::whereId($id)->update($validatedData);

        return redirect()->route('student.index')->with('success', 'Student data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id); 
        $student->delete(); 

        return redirect()->route('student.index')->with('success', 'Student data is successfully deleted'); 
    }
}
