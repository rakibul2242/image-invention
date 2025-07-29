<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'My App')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
    </head>

    <body>
        {{ $slot }}
        @livewireScripts
    </body>

</html>
