@extends('frontend.layout.app')

@section('stylesheets')
    <style>
        .post-modern-countdown {
            font-size: 17px;
        }

        .alert-success{
            background-color: lightgreen;
            color: white;
        }

        figure.post-modern-figure img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            padding: 10px;
        }
    </style>
@endsection

@section('content')

    @livewire('paginated-auctions')

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("#nav-packages").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
@endsection