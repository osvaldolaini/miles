@props(['value'])
<label {{ $attributes->merge(['class' => 'block font-medium text-md text-gray-700 w-2/5']) }}>
    {{ $value ?? $slot }}
</label>

