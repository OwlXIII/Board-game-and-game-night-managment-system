@props(['label', 'variable', 'class' => 'text-sm mt-2'])

<p {{ $attributes->merge(['class' => $class]) }}>
    <strong>{{ __('app.' . $label) }}:</strong> {{ $variable }}
</p>
