<x-dashboard>
    <form action="/admin/posts/{{$post->id}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('patch')

        <x-form.input name="title" value="{{$post->title}}" />
        <x-form.input name="slug" value="{{$post->slug}}" />

        <x-form.input name="thumbnail" type="file" value="{{old('thumbnail', $post->thumbnail)}}" />
        <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="w-20">

        <x-form.textarea name="excerpt">
            {{$post->excerpt}}
        </x-form.textarea>

        <x-form.textarea name="body">
            {{$post->body}}
        </x-form.textarea>

        <x-form.label name="category"/>
        <select name="category_id" id=""
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5">
            @foreach(App\Models\Category::all() as $category)
                <option
                    value="{{$category->id}}" {{$category->id == old('$category', $post->category->id) ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
            @endforeach
        </select>

        <x-submit-button class="mt-5">Update</x-submit-button>
    </form>
</x-dashboard>
