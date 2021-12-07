<x-layout>
    <x-setting heading="Edit Post: {{ $post->title }}">
{{--        {{ dd($post) }}--}}
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data" id="editPostForm">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"/>

            <x-form.input name="slug" :value="old('slug', $post->slug)" />

            <div class="mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" required=""/>
                </div>

                <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl mb-5" width="150" height="150" >
            </div>

            <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}}</x-form.textarea>

            <div class="mb-6 flex flex-col max-w-min space-y-2">
                <x-form.label name="category_id" />

                <select name="category_id" id="category_id" class="-ml-0.5" >
                    @foreach(App\Models\Category::all() as $category)
                        {{-- check if old value for category matches the category in the loop --}}
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />
            </div>

{{--            <x-form.textarea name="body" rows="8">{{old('body', $post->body)}}</x-form.textarea>--}}
            <div class="flex flex-col space-y-2">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></div>
            </div>

            <input type="hidden" id="oldBody" value="{{ $post->body }}">
            <input type="hidden" name="body" id="body">

            <x-form.button>
                Update
            </x-form.button>
        </form>
    </x-setting>
</x-layout>
