@props(['card_name','mana_cost','type','rarity','rules_text','image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300 max-w-xl mx-auto ">
    
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{$card_name }} {{$mana_cost }}</h1>
    <div class="overflow-hidden rounded-lg md-4 flex justify-center">
        <img src="{{asset('images/cards/' . $image)}}" alt=" {{$card_name}} ">
    </div>

    <h2>{{$type}} | {{$rarity}}</h2>
    <p>{{$rules_text}}</p>
</div>