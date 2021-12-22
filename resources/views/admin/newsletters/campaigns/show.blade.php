<x-dashboard.admin>
    <h3 class="text-4xl font-semibold mb-5">{{ $campaign->settings->title }}</h3>
    <table>
        <tbody class="divide-y">
            <tr>
                <td class="bg-gray-100 p-3">Title</td>
                <td class="p-3">{{ $campaign->settings->title }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Subject line</td>
                <td class="p-3">{{ $campaign->settings->subject_line }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Campaign Url</td>
                <td class="p-3"><a href="{{ $campaign->archive_url }}">{{ $campaign->archive_url }}</a></td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Status</td>
                <td class="p-3">{{ $campaign->status }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Emails Sent</td>
                <td class="p-3">{{ $campaign->emails_sent }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Recipients</td>
                <td class="p-3">{{ $campaign->recipients->list_name }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">Delivery date & time</td>
                <td class="p-3">{{ date("D, F j, Y, g:i a", strtotime($campaign->create_time))}}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">From Name</td>
                <td class="p-3">{{ $campaign->settings->from_name }}</td>
            </tr>
            <tr>
                <td class="bg-gray-100 p-3">From Email</td>
                <td class="p-3">{{ $campaign->settings->reply_to }}</td>
            </tr>
        </tbody>
    </table>
</x-dashboard.admin>
