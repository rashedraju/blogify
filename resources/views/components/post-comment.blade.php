@props(['comment'])

<article
    class="flex bg-gray-100 border border-black border-opacity-5 rounded-xl p-5 gap-5">
    <img src="https://i.pravatar.cc/100?u={{$comment->author->id}}" alt="" class="w-20 h-20 rounded-xl">
    <div>
        <h1 class="font-bold">{{$comment->author->name}}</h1>
        <div>
            <time>{{$comment->created_at->diffForHumans()}}</time>
        </div>

        <p class="mt-5">
            {{$comment->body}}
        </p>
    </div>
</article>
