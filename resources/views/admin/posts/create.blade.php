<x-dashboard.admin>
    <h3 class="text-4xl font-semibold mb-5">Create New Post</h3>
    <form action="/admin/posts" method="post" enctype="multipart/form-data">
        @csrf

        <x-form.input name="title" />
        <x-form.input name="slug" />
        <x-form.input name="thumbnail" type="file" />
        <x-form.textarea name="excerpt"> {{ old('excerpt') }} </x-form.textarea>
        <x-form.textarea name="body"> {{ old('body') }} </x-form.textarea>

        <x-form.select label="Status" name="status_id">
            @foreach (App\Models\Status::all() as $status)
                <x-form.select.option :option="$status" selected="{{ $status->id == old('status_id') }}" />
            @endforeach
        </x-form.select>

        <x-form.select label="Category" name="category_id">
            @foreach (App\Models\Category::all() as $category)
                <x-form.select.option :option="$category" selected="{{ $category->id == old('category_id') }}" />
            @endforeach
        </x-form.select>

        <x-button.submit class="mt-5">Post</x-button.submit>
    </form>
</x-dashboard.admin>
