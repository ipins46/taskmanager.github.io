<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Task Manager</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        <main id="app">
            {{-- <navigation></navigation> --}}
            <header-page></header-page>
            <sidebar-page></sidebar-page>
            <content-page></content-page>

            {{-- <div class="py-4">
                <router-view></router-view>
            </div> --}}
        </main>


        {{-- <script src="../js/app.js"></script> --}}
    </body>
</html>
