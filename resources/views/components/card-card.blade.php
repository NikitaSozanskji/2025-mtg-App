@props(['card_name','image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$card_name}}</h4>
    <img src="{{asset('images/cards/' . $image)}}" alt="{{$card_name}}">
</div>