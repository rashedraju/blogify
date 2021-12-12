<x-dashboard.user username="{{ $username }}">
    <h2 class="font-semibold">Followers</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
            @if($visibility)
                @if($followers)
                    @foreach($followers as $follower)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/{{$follower->username}}"
                                class="hover:text-blue-500">
                                    {{ ucfirst($follower->name) }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p class="py-5 text-center font-semibold"> Follower list is empty </p>
                @endif
            @else
                <p class="py-5 text-center font-semibold"> Follower list is hidden </p>
            @endif
        </tbody>
    </table>
</x-dashboard.user>

