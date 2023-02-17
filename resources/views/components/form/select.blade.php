@props(['categories', 'name'])

<x-form.field>
    <x-form.label name="Category" />
    <select name="{{ $name }}" id="{{ $name }}">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
        @endforeach
    </select>
    <x-form.error name="{{ $name }}" />
</x-form.field>
