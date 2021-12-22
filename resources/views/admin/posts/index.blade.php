<x-dashboard.admin>
    <h3 class="text-4xl font-semibold mb-5">All Posts</h3>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="/posts/{{ $post->slug }}" class="hover:text-blue-500">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <a href="/?author={{ $post->author->username }}" class="hover:text-blue-500">
                            {{ $post->author->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-white">
                            {{ ucfirst($post->status->name ?? '') }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/posts/{{ $post->id }}/edit"
                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="/admin/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard.admin>
