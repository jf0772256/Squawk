<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\View\View;

class SquawkController extends Controller
{

    public function index(): Factory|View
    {
        $chirps = [
            [
                'author' => 'Jane Doe',
                'message' => 'Just deployed my first Laravel app! 🚀',
                'time' => '5 minutes ago'
            ],
            [
                'author' => 'John Smith',
                'message' => 'Laravel makes web development fun again!',
                'time' => '1 hour ago'
            ],
            [
                'author' => 'Alice Johnson',
                'message' => 'Working on something cool with Chirper...',
                'time' => '3 hours ago'
            ]
        ];
        return view('home', compact('chirps'));
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
