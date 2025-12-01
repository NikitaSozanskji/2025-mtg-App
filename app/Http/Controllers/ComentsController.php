<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use App\Models\Card;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Card $card)
    {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'nullable|string|max:1000'
        ]);

        $card->coments()->create([
            'user_id' => auth()->id(),
            'rating'=>$request->input('rating'),
            'comment'=>$request->input('comment'),
            'card_id'=>$card->id
        ]);

        return view('cards.show',compact('card'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Coments $coments)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coments $coment)
    {
            // // Check if user is the owner or an admin
            if (auth()->user()->id != $coment->user_id && auth()->user()->role !== 'admin') {
                return redirect()->route('card.index')->with('error', 'Access denied.');
            }

            // I am passing the book and the comment object to the view, as they are both needed
            return view('coments.edit', compact('coment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coments $coment)
    {
         $coment->update($request->only(['rating', 'comment']));

        // once it's updated in the DB, redirect somewhere that makes sense for your application
        return redirect()->route('cards.show', $coment->card_id)->with('success', 'coment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coments $coment)
    {
        $coment->with('comment',$coment);
        $coment->delete();

        return redirect()->route('cards.show', $coment->card_id)->with('success', 'coments updated successfully.');
    }
}
