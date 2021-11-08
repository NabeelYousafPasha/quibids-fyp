<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auctions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-5">
                                Auctions
                            </h3>
                        </div>

                        <div class="text-right">
                            @if(auth()->user()->can('create_auction'))
                            <a
                                href="{{ route('dashboard.auctions.create') }}"
                                class="px-2 py-1 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300"
                            >
                                Add
                            </a>
                            @endif
                        </div>
                    </div>
                    <hr class="m-2">

                    <div class="overflow-auto">
                        @include('backend.pages.auction._table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
