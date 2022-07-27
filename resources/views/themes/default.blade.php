<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @hasSection('title')
            @yield('title')
        @else
            <title>Multiupload</title>
        @endif
      
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
