<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        @yield('title')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-purple.min.css" />
        @yield('style')
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    </head>
    <body>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout mdl-layout--no-desktop-drawer-button  mdl-layout--fixed-header">
        @include('navbar')
        <main class="mdl-layout__content">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
    <script src="/lib/material-design-lite/material.min.js"></script>

    <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
