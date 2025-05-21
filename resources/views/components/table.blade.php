<div>
    <table {{ $attributes->merge(['class' => 'w-full table-auto border-collapse']) }}>
        {{ $slot }}
    </table>
</div>
