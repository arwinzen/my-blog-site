<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data" id="createPostForm">
            @csrf

            <x-form.input name="title"/>

            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excerpt" />

            <div class="mb-6 flex flex-col max-w-min space-y-2">
                <x-form.label name="category_id" />

                <select name="category_id" id="category_id" class="-ml-0.5" >
                    @foreach(App\Models\Category::all() as $category)
                        {{-- check if old value for category matches the category in the loop --}}
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />
            </div>

            <div class="flex flex-col space-y-2">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></div>
            </div>

            <input type="hidden" name="body" id="body" value="{{ old('body') }}">

            <x-form.button>
                Publish
            </x-form.button>
        </form>
    </x-setting>
</x-layout>
