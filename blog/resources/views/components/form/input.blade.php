@props(['name', 'required' => 'required'])
<div class="mb-6">
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full"
{{--           type="{{ $type }}"--}}
           name="{{ $name }}"
           id="{{ $name }}"
{{--           value="{{ old($name) }}"--}}
            {{-- value is old value, if there is one --}}
           {{ $attributes(['value' => old($name)]) }}
           {{ $required }}
    >

    <x-form.error name="{{ $name }}" />
</div>
