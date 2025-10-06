<?php

namespace App\Http\Controllers;

use App\Models\Squawk;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SquawkController extends Controller
{
	use AuthorizesRequests;
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
    public function store(Request $request): Redirector|RedirectResponse
    {
        $validated  = $request->validate(
			['message' => 'required|string|max:500'],
	        [
				'message.required' => 'Please enter a something to squawk!',
		        'message.max' => 'Squawks cannot be longer than 500 characters.',
	        ]
        );
		//Squawk::create(['message' => $validated['message']]);
	    auth()->user()->squawks()->create($validated);
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
	 * @throws AuthorizationException
	 */
    public function edit(Squawk $squawk) : Factory|View
    {
	    $this->authorize('update', $squawk);
        return view('squawks.edit', compact('squawk'));
    }

	/**
	 * Update the specified resource in storage.
	 * @throws AuthorizationException
	 */
    public function update(Request $request, Squawk $squawk) : RedirectResponse|Redirector
    {
	    $this->authorize('update', $squawk);
	    // Validate
	    $validated = $request->validate([
		    'message' => 'required|string|max:500',
	    ]);
		//update
		$squawk->update($validated);
	    //redirect
		return redirect('/')->with('success', 'Squawk updated!');
    }

	/**
	 * Remove the specified resource from storage.
	 * @throws AuthorizationException
	 */
    public function destroy(Squawk $squawk) : RedirectResponse|Redirector
    {
	    $this->authorize('delete', $squawk);
        $squawk->delete();
		return redirect('/')->with('success', 'Squawk deleted!');
    }
}
