@props(['actions'])
<x-layout>
    <x-container>
        <div class="flex gap-5">
            <div class="flex-shrink-0 w-48">
                <aside>
                    <ul>
                        @foreach ($actions as $action)
                            <li class="my-2">
                                <a href="/{{ $action['link'] }}"
                                    class="{{ request()->is($action['link']) ? 'text-blue-500' : '' }} hover:text-blue-500">{{ $action['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="flex flex-1 flex-col p-5 border rounded">
                {{ $slot }}
            </div>
        </div>
    </x-container>
</x-layout>
