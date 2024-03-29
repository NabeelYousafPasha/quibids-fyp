<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-5">
                                Pending Vendors
                            </h3>
                        </div>
                    </div>
                    <hr class="m-2">

                    @include('backend.pages.vendor._table', ['vendors' => $unApprovedVendors])
                </div>
            </div>

            <div class="mt-5 mb-5"></div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-5">
                                Approved Vendors
                            </h3>
                        </div>
                    </div>
                    <hr class="m-2">

                    @include('backend.pages.vendor._table', ['vendors' => $approvedVendors])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
