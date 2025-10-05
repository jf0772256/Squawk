<?php

namespace App\Http\Controllers;

use App\Models\Squawk;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SquawkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Factory|View
    {
        $squawks = Squawk::with('user')->latest()->take(50)->get();

        return view('home', compact('squawks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated  = $request->validate(
			['message' => 'required|string|max:500'],
	        [
				'message.required' => 'Please enter a something to squawk!',
		        'message.max' => 'Squawks cannot be longer than 500 characters.',
	        ]
        );
		Squawk::create(['message' => $validated['message']]);
		return redirect('/')->with('success', 'Squawk created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Squawk $squawk) : Factory|View
    {
        return view('squawks.edit', compact('squawk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
