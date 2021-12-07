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
                        @if(auth()->user()->can('auction_publsih_status'))
                            <a
                                href="{{ route('dashboard.switch.auction.status', ['auction' => $auction]) }}"
                                class="px-2 py-1 m-1 text-white text-sm rounded-sm {{ $auction->is_published ? 'bg-gray-500 hover:bg-gray-700' : 'bg-green-500 hover:bg-green-700' }}"
                            >
                                {{ $auction->is_published ? 'Move to Draft' : 'Move to Publish' }}?
                            </a>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 text-center">
                    @if(auth()->user()->can('create_auction'))
                        <a
                            href="{{ route('dashboard.auctions.media', ['auction' => $auction]) }}"
                            class="px-2 py-1 m-1 text-sm rounded-sm bg-transparent border-2 border-grey-500 text-grey-500 hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                        >
                            Media
                        </a>
                    @endif

                    @if(auth()->user()->can('create_bidding') || auth()->user()->can('bid_auction'))
                        <a
                            href="{{ route('dashboard.bidding.create', ['auction' => $auction]) }}"
                            class="px-2 py-1 m-1 text-white text-sm rounded-sm border-2 {{ $auction->is_published ? 'bg-gray-500 hover:bg-gray-700' : 'bg-yellow-500 hover:bg-yellow-700' }}"
                        >
                            Bid Here
                        </a>
                    @endif

                    @if(auth()->user()->can('view_auction_bids'))
                        <a
                            href="{{ route('dashboard.bidding.index', ['auction' => $auction]) }}"
                            class="px-2 py-1 m-1 text-white text-sm rounded-sm border-2 {{ $auction->is_published ? 'bg-gray-500 hover:bg-gray-700' : 'bg-yellow-500 hover:bg-yellow-700' }}"
                        >
                            View Bids
                        </a>
                    @endif

                    @if(auth()->user()->can('update_auction'))
                        <a
                            href="{{ route('dashboard.auctions.edit', ['auction' => $auction]) }}"
                            class="px-2 py-1 m-1 text-sm rounded-sm bg-transparent border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                        >
                            Edit
                        </a>
                    @endif

                    @if(auth()->user()->can('delete_auction'))
                        <form
                            class="delete__auction"
                            method="POST"
                            action="{{ route('dashboard.auctions.destroy', ['auction' => $auction]) }}"
                            style="display: inline-block;"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type ="submit"
                                class="px-2 py-1 m-1 text-sm rounded-sm bg-transparent border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-gray-100 focus:border-4 focus:border-red-300"
                            >
                                Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
