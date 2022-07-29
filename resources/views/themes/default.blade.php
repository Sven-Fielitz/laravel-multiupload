<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @hasSection('title')
            @yield('title')
        @else
            <title>Multiupload</title>
        @endif

        <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
        <link rel="stylesheet" href="{{url('/css/dropzone.min.css')}}">
        <script language="javascript" type="text/javascript" src="{{url('/js/jquery-3.6.0.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/dropzone.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/app.js')}}"></script>

    </head>
    <body>
        <div class="header">
            @include('themes.components.header')
        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            @include('themes.components.footer')
        </div>
    </body>
</html>
