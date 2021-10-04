<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Rhino Mobility">
    <meta name="description"
          content="@if($content->subtitle) {{ $content->subtitle }} @else Rhino Support @endif">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rhino Mobility | {{ $content->title }}</title>
    <meta property="og:description"
          content="@if($content->subtitle) {{ $content->subtitle }} @else Rhino Support @endif">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/darkmode.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css" media="all" crossorigin="anonymous"/>
</head>
<body>
<div class="grid-container">
    @include('layouts.header')
    <content>
        <div class="max-width">
            @yield('content')
        </div>
    </content>
    <footer class="item5">
        @include('layouts.footer')
    </footer>
</div>
<script src="{{ mix('js/menus.js') }}"></script>
</body>
</html>
