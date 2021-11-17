<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
    <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Auction </th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Offered Price </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Won At </th>
            <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Actions </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($wonBiddings ?? [] as $bidding)
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <p>
                                <a href="{{ route('dashboard.auctions.show', $bidding->auction->id) }}">{{ $bidding->auction->title }}</a>
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                        {{ $bidding->offered_price }}
                    </p>
                </td>
                <td class="px-6 py-4 text-center">
                    {{ @$bidding->won_at }}
                </td>
                <td class="px-6 py-4 text-center">
                    @if(auth()->user()->can('delete_bidding'))
                        <a href="#" class="p-2 pl-5 pr-5 m-1 bg-transparent border-2 border-red-500 text-red-500 text-lg rounded-lg hover:bg-red-500 hover:text-gray-100 focus:border-4 focus:border-red-300">
                            Delete
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
