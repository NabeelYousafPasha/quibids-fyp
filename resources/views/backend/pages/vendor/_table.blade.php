<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
    <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Username </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Email </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Status </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Actions </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($vendors ?? [] as $vendor)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <p>
                                {{ $vendor->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                        {{ $vendor->username }}
                    </p>
                </td>
                <td class="px-6 py-4 text-left">
                    {{ $vendor->email }}
                </td>
                <td class="px-6 py-4 text-left">
                    <p class="text {{ $vendor->approved_at ? 'text-green-500' : 'text-red-500' }}">
                        {{ $vendor->status }}
                    </p>
                </td>
                <td class="px-6 py-4 text-center">

                    <a
                        href="{{ route('dashboard.switch-status', ['role' => \App\Models\Role::VENDOR, 'person' => $vendor,]) }}"
                        class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                    >
                        {{ $vendor->switch_status_button }}
                    </a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
