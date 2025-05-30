@props(['type', 'minName', 'maxName', 'min', 'max', 'label'])

<div class="flex flex-col w-40">
    <x-input-label :value="$label" class="text-green-400 text-center" />

    <div class="flex items-center gap-2">
        <input
            type="{{ $type }}"
            name="{{ $minName }}"
            min="{{ $min }}"
            max="{{ $max }}"
            value="{{ request($minName) }}"
            class="w-20 bg-slate-600 text-white border-green-400 rounded p-2"
        />
        <span class="text-white">–</span>
        <input
            type="{{ $type }}"
            name="{{ $maxName }}"
            min="{{ $min }}"
            max="{{ $max }}"
            value="{{ request($maxName) }}"
            class="w-20 bg-slate-600 text-white border-green-400 rounded p-2"
        />
    </div>
</div>
