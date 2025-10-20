@props(['action', 'method'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">

@csrf

@if($method === 'PUT' || $method === 'PATCH')

@method($method)
@endif


<div class="mb-4">

<label for="card_name" class="block text-sm text-gray-700">card_name</label>

<input

type="text"

name="card_name"

id="card_name"

value="{{ old('card_name', $card->card_name ?? ' ') }}"

required

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />

@error('card_name')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>
//1
<div class="mb-4">

<label for="mana_cost" class="block text-sm text-gray-700">mana_cost</label>

<input

type="text"

name="mana_cost"

id="mana_cost"

value="{{ old('mana_cost', $card->mana_cost ?? ' ') }}"

required

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />

@error('mana_cost')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>
//
//2
<div class="mb-4">

<label for="type" class="block text-sm text-gray-700">type</label>

<input

type="text"

name="type"

id="type"

value="{{ old('type', $card->type ?? ' ') }}"

required

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />

@error('type')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>
//
//3
<div class="mb-4">

<label for="rarity" class="block text-sm text-gray-700">rarity</label>

<input

type="text"

name="rarity"

id="rarity"

value="{{ old('rarity', $card->rarity ?? ' ') }}"

required

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />

@error('rarity')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>
//
//3
<div class="mb-4">

<label for="rules_text" class="block text-sm text-gray-700">rules_text</label>

<input

type="text"

name="rules_text"

id="rules_text"

value="{{ old('rules_text', $card->rules_text ?? ' ') }}"

required

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />

@error('rules_text')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>
//
<div class="mb-4">

<label for="image" class="block text-sm font-medium text-gray-700">Card Cover Image</label>

<input

type="file"

name="image"

id="image"

{{ isset($card) ? '' : 'required' }}

class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"

/>

@error('image')

<p class="text-sm text-red-600">{{ $message }}</p>

@enderror

</div>


@isset($card->image)

<div class="mb-4">
<img src="{{ asset($card->image) }}" alt="Card cover" class="w-24 h-32 object-cover">
</div>
@endisset
<div>
<x-primary-button>
{{ isset($card) ? 'Update Card' : 'Add Card' }}
</x-primary-button>
</div>

</form>