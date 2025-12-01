<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Card;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $artists = Artist::with('cards')->get();
        return view('artists.index',compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('artists.index')->with('error', 'Access denied.');
        }

        $cards = Card::all();
        return view('artists.create', compact('artists'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
        return redirect()->route('artists.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio'   => 'nullable|string|max:1000',
            'cards' => 'array',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/artists'), $imageName);

            $validated['image'] = $imageName;
        }

        $author = Author::create($validated);

        if ($request->has('cards')) {
            $author->cards()->attach($request->cards);
        }

        return redirect()->route('artists.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        $artist->load('cards');
        return (view('artists.show', compact('artist')));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {

        $cards = Card::all();
        $artist_card = $artist->cards->pluck('id')->toArray(); 

        return view('artists.edit', compact('author', 'cards', 'artist_card'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio'   => 'nullable|string|max:1000',
            'cards' => 'array', 
        ]);

        $artist->update($validated);

        if ($request->has('cards')) {
            $artist->cards()->sync($request->cards);
        }

        return redirect()->route('artists.index')->with('success', 'artist updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->cards()->detach(); 
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');

    }
}
