@props(['id', 'rows' => 3, 'required' => false])

<div>
    <x-input-label :for="$id" :value="__('app.' . $id)" class="text-green-400" />
    <textarea
        :id="$id"
        :name="$id"
        :rows="$rows"
        :required="$required"
        class="w-full text-white bg-slate-600 border-green-400 rounded mt-1 p-2"
    >{{ old($id) }}</textarea>
</div>
