@props(['id', 'options' => [], 'required' => false])

<div>
    <x-input-label :for="$id" :value="__('app.' . $id)" class="text-green-400" />
    <select
        :id="$id"
        :name="$id"
        :required="$required"
        class="w-full text-white bg-slate-600 border-green-400 rounded p-2 mt-1"
    >
        @foreach ($options as $key => $label)
            <option value="{{ $key }}" @selected(old($id) == $key)>{{ $label }}</option>
        @endforeach
    </select>
</div>
