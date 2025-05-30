@props(['id', 'type' => 'text', 'value' => '', 'required' => false, 'min' => null, 'name'])

<div>
    <x-input-label :for="$id" :value="__('app.' . $name)" class="text-green-400" />
    <x-text-input
        :id="$id"
        :name="$id"
        :type="$type"
        :value="$value"
        :required="$required"
        :min="$min"
        class="w-full text-white bg-slate-600 border-green-400 mt-1"
    />
</div>
