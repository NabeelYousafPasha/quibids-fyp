<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- @if ($auth->wasRecentlyCreated ?? false) --}}
                @role(App\Models\Role::USER)
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Thanks for being a valuable member !</p>
                            <p class="text-sm">You have been awarded <b class="text-xl font-bold">{{ $authUser->bids_left }}</b> free bids upon registration.</p>
                        </div>
                    </div>
                </div>
                @endrole
            {{-- @endif --}}
        </div>

        <section class="min-h-screen px-4 bg-white pt-5 pb-5">

            <div class="h-64 grid grid-rows-3 grid-flow-col gap-4">
                @foreach($items as $key => $item)
                    <div class="shadow-md p-4">
                        <div class="flex flex-col">
                            <div class="flex space-x-8 w-56">
                                <div class="">
                                    <div class="uppercase text-sm text-gray-700">
                                        {{ $key }}
                                    </div>
                                    <div class="mt-1">
                                        <div class="flex space-x-2 items-center">
                                            <div class="text-2xl">
                                                {{ $item }}
                                            </div>
                                            <div class="text-xs text-green-800 bg-green-200 rounded-md p-1">
                                                Total
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


    </div>
</x-app-layout>
