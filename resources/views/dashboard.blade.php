<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="px-4 bg-white pt-5 pb-5">
            <div class="w-full p-3">
                    <div class="uppercase text-black font-bold text-xl mb-2 leading-tight">
                        Filters
                    </div>
                    <hr><form class="w-full max-w-lg" action="{{route('dashboard.index')}}" method="GET" role="search">
                    
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                              From
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="date" name="from">
                          </div>
                          <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                              To
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date" name="to">
                          </div>
                          <div class="w-full md:w-1/2 px-3">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Apply Filter
                            </button>
                          </div>
                        </div>
                      </form>
            
        </section>

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
            @foreach($stats ?? [] as $key => $items)
                <div class="w-full p-3">
                    <div class="uppercase text-black font-bold text-xl mb-2 leading-tight">
                        {{ $key }}
                    </div>
                    <hr>
                    <br>
                    @foreach($items as $itemKey => $itemValue)
                        <div class="shadow-md p-4">
                            <div class="flex flex-col">
                                <div class="flex space-x-8 w-56">
                                    <div class="">
                                        <div class="uppercase text-sm text-gray-700">
                                            {{ $itemKey }}
                                        </div>
                                        <div class="mt-1">
                                            <div class="flex space-x-2 items-center">
                                                <div class="text-2xl">
                                                    {{ $itemValue }}
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
            @endforeach
        </section>

    </div>
</x-app-layout>
