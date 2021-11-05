<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('VENDORS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-3" style="font-size:20px !important; font-weight:bold">Pending Vendors</h1>
                    @include('frontend.pages.vendor._table', ['unApprovedVendors' => $unApprovedVendors])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
