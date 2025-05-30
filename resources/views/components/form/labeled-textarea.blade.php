@props(['id', 'name' => null, 'rows' => 3, 'required' => false,])

@php
    $name = $name ?? $id;
@endphp

<div class="mb-4">
    <x-input-label :for="$id" :value="__('app.' . $name)" class="text-green-400" />
    <textarea :id="$id" :name="$name" rows="{{ $rows }}"
            @if($required) required @endif
            class="w-full text-white bg-slate-600 border-green-400 rounded mt-1 p-2"
            >{{ old($name) }}</textarea>
</div>
