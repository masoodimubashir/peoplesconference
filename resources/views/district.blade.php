<x-app-layout>

    <x-title>
        District
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Districts') }}
            </h2>
            @can('is_admin')
                <x-secondary-button>

                    <a href="district/create">
                        Create District
                    </a>

                </x-secondary-button>
            @endcan


        </div>

    </x-slot>


    <div class="py-12 p-4">


        <form action="{{ route('district.index') }}" method="GET">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search"
                       id="default-search"
                       name="query"
                       class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search District...">
                <button type="submit"  class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>


        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class=" text-white">

                    @error('error')
                        <x-error>
                            <span class="font-medium">Error!:</span>
                            {{ $message }}.
                        </x-error>
                    @enderror

                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif



                    <div class="flex justify-center ">
                        <div class="overflow-auto lg:overflow-visible  w-full py-4 px-2 ">
                            @if ($districts)


                                <div class="grid md:grid-cols-4 gap-3 text-center min-h-[400px]">
                                    @foreach ($districts as $district)
                                        <div
                                            class="border border-gray-600 h-36  rounded p-3 hover:scale-105 duration-200 ease-in-out delay-75 hover:bg-gray-800 cursor-pointer space-y-3">
                                            <h1>{{ $district->name }}</h1>
                                            <a href="{{ route('district.show', [$district->id]) }}">Constituency :
                                                {{ $district->constituencies_count }}</a>

                                            @can('is_admin')
                                                <ul class="flex items-center justify-around">

                                                    <li>
                                                        <a href="{{ route('district.edit', [$district->id]) }}">
                                                            <i class="fa-regular fa-pen-to-square"></i>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form class="delete-form" data-district-name="{{ $district->name }}"
                                                              action="{{ route('district.destroy', [$district->id]) }}" method="POST"
                                                              onsubmit="return confirm('Warning: Are You Sure You Want To Delete This Data? Your Data Will Be Lost');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button >
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>



                                                    </li>
                                                </ul>
                                            @endcan


                                        </div>
                                    @endforeach
                                </div>
                                {{ $districts->links() }}
                            @else
                                <div>
                                    <h1>
                                        No District In Database
                                    </h1>
                                </div>

                            @endif

                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>


</x-app-layout>




