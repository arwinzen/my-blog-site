@props(['name', 'rows' => 3])
<div class="mb-6">
    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-200 p-2 w-full"
              type="text"
              rows="{{ $rows }}"
              name="{{$name}}"
              id="{{$name}}"
              required
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</div>
