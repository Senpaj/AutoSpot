<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('image-view');
    }
    public function store(Request $request)
    {  
   
    }
}
