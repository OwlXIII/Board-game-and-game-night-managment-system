@props(['id', 'name' => null, 'type' => 'text', 'value' => '', 'required' => false, 'min' => null,])

@php
    $name = $name ?? $id;
@endphp

<div class="mb-4">
    <x-input-label :for="$id" :value="__('app.' . $name)" class="text-green-400" />
    <x-text-input :id="$id" :name="$name" :type="$type" :value="old($name, $value)" :required="$required" :min="$min" class="w-full text-white bg-slate-600 border-green-400 mt-1"/>
</div>
