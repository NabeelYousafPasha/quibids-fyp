<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-5">
                                Categories
                            </h3>
                        </div>
                    </div>

                    <hr class="m-2">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form
                        method="POST"
                        action="{{ $form['route'] }}"
                    >
                        @csrf

                        @if($form['_method'] ?? null)
                            @method($form['_method'])
                        @endif

                        @include('backend.pages.category._form')

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
