<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('WebImages/logo.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-871b95be.css') }}">
    <script src="{{ asset('build/assets/app-21ee9d6e.js') }}"></script> --}}
    <script src="{{ asset('custom.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}

</head>

<body class="bg-gray-900">
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border border-gray-600  shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>



    </div>

    <script src="{{ asset('build/assets/app-21ee9d6e.js') }}"></script>
</body>

</html>
