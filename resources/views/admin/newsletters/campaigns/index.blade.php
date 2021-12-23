<x-dashboard.admin>
    <h3 class="text-4xl font-semibold mb-5">All Campaigns</h3>

    <div class="divide-y">
        @forelse ($campaigns as $campaign)
            <div class="p-3 flex justify-between">
                <div>
                    <a href="/admin/newsletters/campaigns/{{ $campaign->id }}" class="text-2xl">
                        {{ $campaign->settings->title }}
                    </a>
                    <div>Type: {{ $campaign->type }}</div>
                    <div>Status: {{ $campaign->status }}</div>
                    <div>Recipients List: {{ $campaign->recipients->list_name }}</div>
                </div>

                <div class="flex">
                    <form action="/admin/newsletters/campaigns/{{ $campaign->id }}/send" method="post">
                        @csrf
                        <x-button.submit class="text-white"> Send </x-button.submit>
                    </form>

                    <form action="/admin/newsletters/campaigns/{{ $campaign->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-button.submit class="px-8 py-2 m-5 text-white rounded-xl" background="bg-gray-900 hover:bg-gray-700"> Delete </x-button.submit>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-sm">You have no campaign</div>
        @endforelse
    </div>
</x-dashboard.admin>
