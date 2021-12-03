<x-layout>
    @include('components.header')
    <main>
        @if($posts->count())
            <x-feature_post :post="$posts[0]" />
        @else
            <p class="text-center">No post found</p>
        @endif
        @if($posts->count() > 1)
            <div class="lg:grid lg:grid-cols-6">
                @foreach($posts->skip(1) as $post)
                    <x-post :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"> </x-post>
                @endforeach
            </div>
            <div>
                {{$posts->links()}}
            </div>
        @endif
    </main>
</x-layout>
