<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return view('cards.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'card_name'=>'required',
            'mana_cost'=>'required',
            'type'=>'required',
            'rarity'=>'required',
            'rules_text'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);


        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images\cards'),$imageName);
        }

        Card::create([
            'card_name'=>$request->card_name,
            'mana_cost'=>$request->mana_cost,
            'type'=>$request->type,
            'rarity'=>$request->rarity,
            'rules_text'=>$request->rules_text,
            'image'=>$imageName,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return to_route('cards.index')->with('success','Card created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        $card->load('coments.user');
        return view('cards.show',compact('card'));
        // return view('cards.show')->with('card',$card);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return view('cards.edit')->with('card',$card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'card_name'=>'required',
            'mana_cost'=>'required',
            'type'=>'required',
            'rarity'=>'required',
            'rules_text'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);


        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images\cards'),$imageName);
        }
//
                $card->update([
            'card_name'=>$request->card_name,
            'mana_cost'=>$request->mana_cost,
            'type'=>$request->type,
            'rarity'=>$request->rarity,
            'rules_text'=>$request->rules_text,
            'image'=>$imageName,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
//
        return to_route('cards.index')->with('success','Card updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        
        $path = public_path('images/cards/'. $card->image);
        if (File::exists($path)) {
            File::delete($path);
        }

        $card->with('card',$card);
        $card->delete();

        return redirect()->route('cards.index')->with('success', 'card deleted successfully.');
    } 
}
