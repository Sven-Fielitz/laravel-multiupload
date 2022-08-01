<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', "Multiupload")</title>

        <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
        <link rel="stylesheet" href="{{url('/css/dropzone.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/datatables.min.css')}}">

    </head>
    <body class="bg-light">
        
        @include('themes.components.header')

        <div class="content container mt-4">
            @include('themes.components.flashMessages')
            @yield('content')
        </div>
        
        @include('themes.components.footer')
        
        <!-- JavaScript -->
        <script language="javascript" type="text/javascript" src="{{url('/js/jquery-3.6.0.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/dropzone.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/datatables.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/dataTables.bootstrap5.min.js')}}"></script>
        <script language="javascript" type="text/javascript" src="{{url('/js/app.js')}}"></script>
    </body>
</html>
