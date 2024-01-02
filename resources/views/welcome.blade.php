<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>



    <link rel="shortcut icon" href="{{ asset('WebImages/logo.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="{{ asset('custom.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class="bg-gray-900">
    <img class="w-full h-full object-cover blur-sm" src="{{ asset('WebImages/Kashmir.jpeg') }}">

    <img class="absolute w-20 h-20 top-10 rounded-full  left-10" src="{{ asset('WebImages/logo.jpeg') }}"
        alt="">


    <div class="absolute t-0 l-0 top-0 left-0 w-full flex flex-col items-center justify-center h-full ">


        <h1 class="text-4xl text-white text-center">Welcome To Jammu And Kashmir <br> People's Conference</h1>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class=" bg-black rounded text-white p-3 hover:bg-white duration-100 text-sm  delay-100 transition-all hover:scale-110 cursor-pointer  hover:text-black  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class=" bg-black rounded text-white p-3 hover:bg-white duration-100 text-sm  delay-100 transition-all hover:scale-110 cursor-pointer  hover:text-black  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

{{--                     @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}"--}}
{{--                            class="ml-4  bg-black rounded text-white p-3 hover:bg-white duration-100 text-sm--}}
{{--                             delay-100 transition-all hover:scale-110 cursor-pointer  hover:text-black  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                    @endif--}}
                @endauth
            </div>
        @endif



    </div>

    <div class="flex items-center justify-center  absolute bottom-0 gap-1 text-white font-extrabold w-full p-0">
        Developed & Designed By
        <a href="https://www.sourchtech.com/">
            <img class=" h-40 rounded-md p-0"
                src="{{ asset('WebImages/Sourch_Technologies_Logo-removebg-preview.png') }}" alt="">
        </a>
    </div>




</body>


</html>
