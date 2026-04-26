<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Homecontroller
{
    public function index()
    {
        return view('home');
    }
}
