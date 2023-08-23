<x-layout>
    <x-setting heading="New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>
                <select name="category_id" id="category_id" class="px-2 py-1 color2 rounded-full  ">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>



            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
