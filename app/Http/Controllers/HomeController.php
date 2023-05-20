<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;


class HomeController extends Controller
{
    
    // public function index() {
    //     //home is the folder name under views and index is the file name
    //     return view('home.index');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return view('home.index', compact('students'));
    }

}
