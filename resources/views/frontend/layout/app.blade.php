<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.partials.head')
    @yield('stylesheets')
</head>
<body>
    @include('frontend.partials.ie')

    @include('frontend.partials.preloader')

    <div class="page">
        @include('frontend.partials.header')

        @if(session()->has('status') ?? false)
            <!-- Session Status -->
            <div class="m-2 p-2">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')

        @include('frontend.partials.footer')
    </div>

    <div class="snackbars" id="form-output-global"></div>

    @include('frontend.partials.scripts')
    @yield('scripts')
    @livewireScripts

</body>
</html>
