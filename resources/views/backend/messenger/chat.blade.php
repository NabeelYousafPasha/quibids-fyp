<x-app-layout>

    @section('stylesheets')


    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messenger') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-5">
                                Messenger
                            </h3>
                        </div>
                    </div>
                    <hr class="m-2">

                    <main>
                        @livewire('chat', ['recipient' => $recipient,])
                    </main>


                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
        </script>

        @livewireScripts
    @endsection
</x-app-layout>
