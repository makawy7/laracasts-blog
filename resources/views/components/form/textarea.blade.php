@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea class="border border-grey-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" cols="30"
        rows="1">{{ $attributes->get('value') }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
