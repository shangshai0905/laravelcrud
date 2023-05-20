<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        //if there is subfolder just add ex. foldername.list
        //compact(variable that created in line 16)
        return view('list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //VALIDATION
        $storedData = $request-> validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'birthday' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required'

        ]);
        //
        Students::create($storedData);
        return redirect('/') -> with('success', 'Students has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $student = Students::findOrFail($id);
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $storedData = $request-> validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'birthday' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required'

        ]);
        Students::whereId($id)->update($storedData);
        return redirect('/') -> with('success', 'Student has been updated');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $student = Students::findOrFail($id);
        $student->delete();
        return redirect('/') -> with('success', 'Student has been removed!');
    }
}
