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
@endsection
