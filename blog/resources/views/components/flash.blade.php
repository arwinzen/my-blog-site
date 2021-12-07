{{-- check if session contains the success key --}}
@if (session()->has('success'))
    {{-- define show as true --}}
    <div x-data="{ show: true }"
         {{-- initialise a timeout when this div is rendered --}}
         x-init="setTimeout(() => show = false, 4000)"
         {{-- only show the div if 'show' is true --}}
         x-show="show"
         class="fixed bg-blue-300 text-white py-2 px-4 rounded bottom-3 right-3 text-sm">
        {{-- display the success message defined in the RegisterController --}}
        <p>{{ session('success') }}</p>
    </div>
@endif
