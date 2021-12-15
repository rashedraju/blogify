@props(['post'])

@if ($bookmark = auth()->user()->bookmarks()->firstWhere('post_id', $post->id))
    <form action="/{{ auth()->user()->username }}/bookmarks/{{ $bookmark->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" title="Remove From Bookmark">
            <?xml version="1.0" encoding="UTF-8"?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50"
                width="35px" height="35px">
                <g id="surface6650779">
                    <path
                        style="stroke:none;fill-rule:nonzero;fill:rgb(20.392157%,59.607846%,85.882354%);fill-opacity:1;"
                        d="M 37 48 C 36.824219 48 36.652344 47.953125 36.496094 47.863281 L 25 41.15625 L 13.503906 47.863281 C 13.195312 48.042969 12.8125 48.046875 12.503906 47.867188 C 12.191406 47.6875 12 47.359375 12 47 L 12 3 C 12 2.449219 12.449219 2 13 2 L 37 2 C 37.554688 2 38 2.449219 38 3 L 38 47 C 38 47.359375 37.808594 47.6875 37.496094 47.867188 C 37.34375 47.957031 37.171875 48 37 48 Z M 37 48 " />
                </g>
            </svg>
        </button>
    </form>
@else
    <form action="/{{ auth()->user()->username }}/bookmarks" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <button type="submit" title="Add To Bookmark">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="35px" height="35px">
                <path
                    d="M 12.8125 2 C 12.335938 2.089844 11.992188 2.511719 12 3 L 12 47 C 11.996094 47.359375 12.1875 47.691406 12.496094 47.871094 C 12.804688 48.054688 13.1875 48.054688 13.5 47.875 L 25 41.15625 L 36.5 47.875 C 36.8125 48.054688 37.195313 48.054688 37.503906 47.871094 C 37.8125 47.691406 38.003906 47.359375 38 47 L 38 3 C 38 2.449219 37.550781 2 37 2 L 13 2 C 12.96875 2 12.9375 2 12.90625 2 C 12.875 2 12.84375 2 12.8125 2 Z M 14 4 L 36 4 L 36 45.25 L 25.5 39.125 C 25.191406 38.945313 24.808594 38.945313 24.5 39.125 L 14 45.25 Z" />
            </svg>
        </button>
    </form>
@endif
