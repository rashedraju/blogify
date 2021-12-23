<x-dashboard.admin>
    <h3 class="text-4xl font-semibold mb-5">{{ $post->title }}</h3>
    <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <x-form.input name="title" value="{{ $post->title }}" />

        <x-form.select label="Author" name="user_id">
            @foreach (App\Models\User::authors() as $author)
                <x-form.select.option :option="$author"
                    selected="{{ $post->author->id == old('user_id', $author->id) }}" />
            @endforeach
        </x-form.select>

        <x-form.input name="slug" value="{{ $post->slug }}" />

        <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $post->thumbnail) }}" />
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="w-20">

        <x-form.textarea name="excerpt">
            {{ $post->excerpt }}
        </x-form.textarea>

        <x-form.select label="Status" name="status_id">
            @foreach (App\Models\Status::all() as $status)
                <x-form.select.option :option="$status"
                    :selected="old('status_id', $post->status->id) === $status->id" />
            @endforeach
        </x-form.select>

        <x-form.select label="Category" name="category_id">
            @foreach (App\Models\Category::all() as $category)
                <x-form.select.option :option="$category"
                    selected="{{ $category->id == old('category_id', $post->category->id) }}" />
            @endforeach
        </x-form.select>

        <x-form.textarea name="body">
            {{ $post->body }}
        </x-form.textarea>

        <x-button.submit class="mt-5">Update</x-button.submit>
    </form>
</x-dashboard.admin>
