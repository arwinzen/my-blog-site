@props(['name'])
<label for="{{ $name }}" class="font-semibold uppercase">
    {{ $name === 'category_id' ? 'Category' : ucwords($name) }}
</label>
