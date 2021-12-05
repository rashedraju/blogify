<x-layout>
    <x-container>
        <div class="flex gap-5">
            <div class="flex-shrink-0 w-48">
                <aside>
                    <ul>
                        <li class="my-2">
                            <a href="/admin/posts"
                               class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}} hover:text-blue-500">All
                                posts</a>
                        </li>
                        <li class="my-2">
                            <a href="/admin/posts/create"
                               class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}} hover:text-blue-500">Create
                                new post</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="flex flex-1 flex-col p-5 border rounded">
                {{$slot}}
            </div>
        </div>
    </x-container>
</x-layout>
