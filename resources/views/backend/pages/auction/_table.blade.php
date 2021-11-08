<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
    <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Title </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Description </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Estimated Price </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Estimated Expiry </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Availabilty </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Sold At </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Status </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Actions </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($auctions ?? [] as $auction)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p>
                            {{ $auction->title }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{ $auction->description }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p>
                            {{ $auction->estimated_price }} $
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p>
                            {{ $auction->estimated_expire_at }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p class="text {{ $auction->sold_at ? 'text-red-500' : 'text-green-500' }}">
                            {{ $auction->availability }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p>
                            {{ $auction->sold_at ?? 'N/A' }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <p class="text {{ $auction->is_published ? 'text-green-500' : 'text-gray-400' }}">
                            {{ $auction->status }}
                        </p>
                    </div>
                </td>
                <td class="px-6 py-4 text-center">
                    <a
                        href="{{ route('dashboard.auctions.media', ['auction' => $auction]) }}"
                        class="px-2 py-1 m-1 bg-transparent border-2 border-grey-500 text-grey-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                    >
                        Media
                    </a>
                    <a
                        href="{{ route('dashboard.auctions.edit', ['auction' => $auction]) }}"
                        class="px-2 py-1 m-1 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                    >
                        Edit
                    </a>
                    <a href="#" class="px-2 py-1 m-1 bg-transparent border-2 border-red-500 text-red-500 text-lg rounded-lg hover:bg-red-500 hover:text-gray-100 focus:border-4 focus:border-red-300">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
