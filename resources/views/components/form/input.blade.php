@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input value="{{ old($name) }}" class="border border-grey-400 p-2 w-full" type="{{ $type }}"
        name="{{ $name }}" id="{{ $name }}">
    <x-form.error name="{{ $name }}" />
</x-form.field>
