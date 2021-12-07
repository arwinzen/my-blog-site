@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full mr-4">
                <h2>Make your voice heard!</h2>
            </header>

            <div class="mt-5">
                 <textarea
                     name="body"
                     rows="5"
                     class="w-full focus:outline-none focus:ring text-sm rounded"
                     placeholder="Say something..."
                     required
                 ></textarea>

                @error('body')
                <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex justify-end border-t border-gray-200 pt-2 mt-2">
                <x-form.button>Comment</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline text-blue-400">Register</a>
        or
        <a href="/login" class="hover:underline text-blue-400">log In</a> to comment.
    </p>
@endauth
