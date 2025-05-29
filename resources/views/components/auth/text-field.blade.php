@props(['id' , 'autocomplete', 'type'])

<div>
    <x-input-label for="{{ $id }}" :value="__('app.' . $id)" class="text-green-400" />
    <x-text-input id="{{$id}}" class="block mt-1 w-full text-white border-green-400 bg-slate-600" type="{{$type}}" name="{{$id}}" :value="old('{{$id}}')" required autofocus autocomplete="{{$autocomplete}}" />
    <x-input-error :messages="$errors->get($type)" class="mt-2" />
</div>

