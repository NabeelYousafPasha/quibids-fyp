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

        @yield('content')

        @include('frontend.partials.footer')
    </div>

    <div class="snackbars" id="form-output-global"></div>

    @include('frontend.partials.scripts')
    @yield('scripts')

</body>
</html>
