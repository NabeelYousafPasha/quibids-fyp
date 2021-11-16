<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Auction') }}
    </h2>
</x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2 gap-4 mb-3">
                    </div>
                    <div class="overflow-auto">                        
                        <table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-gray-900">
                                <tr class="text-white text-left">
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Title </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Description </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Media </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Estimated Price </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Estimated Expiry </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Sold At </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
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
                                        @if($auction->getFirstMedia('auction'))
                                        <div class="flex items-center space-x-3">
                                            <img
                                                style='height: 50%; width: 50%; object-fit: cover'
                                                src="{{ $auction->getFirstMedia('auction')->getUrl() }}"
                                                alt="{{ $auction->getFirstMedia('auction')->name }}"
                                                width="50px"
                                                height="50px"
                                            />
                                        </div>
                                        @endif
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
                                            <p>
                                                {{ $auction->sold_at ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </td>                              
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>