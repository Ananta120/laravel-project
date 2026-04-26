<?php
namespace App\Http\Controllers;

use illuminate\http\Request;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}