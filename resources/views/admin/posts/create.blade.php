<x-dashboard>
    <form action="/admin/posts" method="post"
          enctype="multipart/form-data">
        @csrf

        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.input name="thumbnail" type="file"/>
        <x-form.textarea name="excerpt"> {{old('excerpt')}} </x-form.textarea>
        <x-form.textarea name="body"> {{old('body')}} </x-form.textarea>

        <x-form.label name="category"/>
        <select name="category_id" id=""
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5">
            @foreach(App\Models\Category::all() as $category)
                <option
                    value="{{$category->id}}" {{$category->id == old('$category') ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
            @endforeach
        </select>

        <x-submit-button class="mt-5">Post</x-submit-button>
    </form>
</x-dashboard>
