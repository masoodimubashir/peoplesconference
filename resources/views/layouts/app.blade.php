<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src=" https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js "></script>

    <link rel="shortcut icon" href="{{asset('WebImages/logo.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('style.css') }}">


{{--     <link rel="stylesheet" href="{{ asset('build/assets/app-871b95be.css') }}">--}}

{{--    <script src="{{ asset('build/assets/app-21ee9d6e.js') }}"></script>--}}

    <script src="{{asset('custom.js')}}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

{{--     <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}


</head>

<body class="bg-gray-900">

    <div class="min-h-screen ">

        @include('layouts.navigation')


        <!-- Page Heading -->
        @if (isset($header))

            <header class="shadow">

                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">

                    {{ $header }}

                </div>

            </header>

        @endif

        <!-- Page Content -->
        <main>

            {{ $slot }}

        </main>


        @include('components.footer')
    </div>


    <script src="{{ asset('build/assets/app-21ee9d6e.js') }}"></script>

</body>


</html>
