@props(['type' , 'autocomplete', 'label', 'id'])

<div>
    <x-input-label for="{{ $id }}" :value="__('app.' . $label)" class="text-green-400" />
    <x-text-input id="{{ $id }}" class="block mt-1 w-full text-white border-green-400 bg-slate-600" type="{{ $type }}" name="{{ $id }}" required autocomplete="{{ $autocomplete }}" />
    <x-input-error :messages="$errors->get('{{ $id }}')" class="mt-2" />
</div>

