<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SquawkController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function edit()
    {
        // shows edit / create view
    }

    public function list()
    {
        // displays a list of all squawks
    }
}
