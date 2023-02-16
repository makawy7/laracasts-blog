<label for="category_id" class="block mb-2 uppercase font-bold text-xs text-grey-700">Catrgoty</label>
<select name="category_id" id="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
    @endforeach
</select>
