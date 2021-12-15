<x-dashboard.user username="{{ $username }}">
    <h2 class="font-semibold">Bookmarks</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($visibility)
                @if ($bookmarks)
                    @foreach ($bookmarks as $bookmark)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/posts/{{ $bookmark->post->slug }}" class="hover:text-blue-500">
                                    {{ $bookmark->post->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="/{{ $username }}/bookmarks/{{ $bookmark->id }}" method="POST">
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
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p class="py-5 text-center font-semibold"> Bookmark list is empty </p>
                @endif
            @else
                <p class="py-5 text-center font-semibold"> Bookmark list is hidden </p>
            @endif
        </tbody>
    </table>
</x-dashboard.user>
