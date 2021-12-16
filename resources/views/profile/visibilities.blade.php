<x-dashboard.user username="{{ $user->username }}">
    <h2 class="font-semibold">Visibilities</h2>

    <form method="POST" action="/{{ $user->username }}/visibilities">
        @csrf
        @method('PUT')

        <div class="min-w-full divide-y divide-gray-200">
            @php
                $visibilities = $user->visibilities->toArray();
            @endphp
            @foreach($visibilities as $key => $value)
                <div class="flex justify-between px-6 py-4 whitespace-nowrap">
                    <div>
                        Anyone can see you'r {{ $key }}
                    </div>
                    <x-toggle :key="$key" :default="$value" />
                </div>
            @endforeach

        </div>
        <x-button.submit class="ml-auto block mr-8"> Save </x-button.submit>

    </form>
</x-dashboard.user>

