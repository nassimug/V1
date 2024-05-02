<?php

namespace App\Http\Controllers;

class Controller
{
    public function index()
    {
        return redirect()->route('layouts.app');
    }
    
}
