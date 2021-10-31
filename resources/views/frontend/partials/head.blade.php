<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="icon" href="{{ asset("frontend-assets/images/favicon.ico") }}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800,900%7CMontserrat:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="{{ asset("frontend-assets/css/bootstrap.css") }}">
<link rel="stylesheet" href="{{ asset("frontend-assets/css/fonts.css") }}">
<link rel="stylesheet" href="{{ asset("frontend-assets/css/style.css") }}">

<style>
    .ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}
</style>
