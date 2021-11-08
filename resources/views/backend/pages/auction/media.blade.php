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
                                Auctions > {{ $auction->title }}
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
                        action="{{ route('dashboard.auctions.media', ['auction' => $auction]) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <!-- Media -->
                            <div>
                                <label for="media">Image *</label>

                                <input
                                    id="media"
                                    type="file"
                                    name="media"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full block mt-1 w-full"
                                    required
                                    accept="image/*"
                                />
                            </div>

                            <div id="content" class="mt-5 mb-5">
                                <div class="frame">
                                    <img
                                        src=""
                                        class="img-responsive img-fluid logo_input"
                                        id="selected_image"
                                        width="200px"
                                        height="200px"
                                        alt="selected_image"
                                    >
                                </div>
                            </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Upload') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="mt-5"></div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mt-2 mb-2">
                        <h3 class="text-2xl font-bold leading-5">
                            Media
                        </h3>
                    </div>

                    <div class="flex flex-row">
                        @foreach($auctionMediaItems ?? [] as $media)

                        <div class="col mx-2 my-2">
                            <div style='height: 200px; width: 200px;'>
                                <img
                                    style='height: 100%; width: 100%; object-fit: cover'
                                    src="{{ $media->getUrl() }}"
                                    alt="{{ $media->name }}"
                                    width="200px"
                                    height="200px"
                                />
                            </div>
                            <span class="small text-sm text-center">
                                {{ $media->created_at }}
                            </span>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

            let selected_image = $('#selected_image');

            // hide it
            selected_image.hide()

            $("#media").change(function(){
                renderImage(this);
            });

            function renderImage(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        selected_image.show('slow');
                        selected_image.attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endsection
</x-app-layout>
