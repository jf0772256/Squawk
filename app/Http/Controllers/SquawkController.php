<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\View\View;

class SquawkController extends Controller
{

    public function index(): Factory|View
    {
        return view('home');
    }

    public function edit(): Factory|View
    {
        // shows edit form
        return view('');
    }

    public function create(): Factory|View
    {
        // shows create form
        return view('');
    }

    public function list(): Factory|View
    {
        // displays a list of all squawks
        return view('');
    }
}
