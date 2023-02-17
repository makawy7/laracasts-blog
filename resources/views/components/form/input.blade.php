@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input class="border border-grey-400 p-2 w-full" type="{{ $type }}" name="{{ $name }}"
        value="{{ $attributes->get('value') }}" id="{{ $name }}">
    <x-form.error name="{{ $name }}" />
</x-form.field>
