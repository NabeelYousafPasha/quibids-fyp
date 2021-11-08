<x-app-layout>


    @section('stylesheets')
        <style>
            .modal {
                transition: opacity 0.25s ease;
            }
            body.modal-active {
                overflow-x: hidden;
                overflow-y: visible !important;
            }
      </style>

    @endsection

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

        @include('backend.globals.modals.delete')

    </div>

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">

            function toggleModal () {
                const body = document.querySelector('body')
                const modal = document.querySelector('.modal')
                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
                body.classList.toggle('modal-active')
            }

            $(document).ready(function(){
                $('.delete__auction').on('click', function(e){
                    e.preventDefault();
                    let $form = $(this);

                    toggleModal();

                    $('#modal__global_delete').on('click', '#delete__btn', function(){
                        $form.submit();
                    });

                });
            });


            const overlay = document.querySelector('.modal-overlay')
            overlay.addEventListener('click', toggleModal)

            let closemodal = document.querySelectorAll('.modal-close')
            for (var i = 0; i < closemodal.length; i++) {
                closemodal[i].addEventListener('click', toggleModal)
            }

            document.onkeydown = function(evt) {
                evt = evt || window.event
                let isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Escape" || evt.key === "Esc")
                } else {
                    isEscape = (evt.keyCode === 27)
                }
                if (isEscape && document.body.classList.contains('modal-active')) {
                    toggleModal()
                }
            };

        </script>
    @endsection
</x-app-layout>
