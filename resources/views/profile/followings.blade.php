<x-dashboard.user username="{{ $username }}">
    <h2 class="font-semibold">Followings</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
            @if($visibility)
                @if($followings)
                    @foreach($followings as $followed)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/{{$followed->username}}"
                                class="hover:text-blue-500">
                                    {{ ucfirst($followed->name) }}
                                </a>
                            </td>

                            @self
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="/{{ $username }}/followings/{{$followed->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-white">Unfollow</button>
                                    </form>
                                </td>
                            @endself
                        </tr>
                    @endforeach
                @else
                    <p class="py-5 text-center font-semibold"> Following list is empty </p>
                @endif
            @else
                <p class="py-5 text-center font-semibold"> Following list is hidden </p>
            @endif
        </tbody>
    </table>
</x-dashboard.user>

