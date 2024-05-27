<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 snippet-html js-focus-visible">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'eDMS' }}</title>
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles

</head>
<body class="flex flex-col min-h-full font-sans antialiased text-gray-600">

    <main class="flex-auto min-h-screen bg-gray-200">
        <div class="overflow-hidden">
            <div>
            {{-- <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8"> --}}
                {{ $slot }}
            </div>
        </div>
    {{-- @yield('content') --}}
    </main>

    <x-notification />
    @livewireScripts
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
