@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea
        class="border border-gray-500 color2 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
