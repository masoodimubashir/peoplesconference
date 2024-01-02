<x-app-layout>

    <x-title>
        Constituency
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('All District With Constituencies') }}
            </h2>

            @can('is_admin')
                <x-secondary-button>

                    <a href="{{ route('constituency.create') }}">
                        Create Constituency
                    </a>

                </x-secondary-button>
            @endcan
        </div>

    </x-slot>

    <div class="py-12 px-4">
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('error'))
                        <x-error>
                            <span class="font-medium">Error!:</span>
                            {{ session('error') }}
                        </x-error>
                    @endif


                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif


                    <div class="flex justify-center text-white">
                        <div class="container mx-auto ">
                            <div>

                                <h1 class="text-xl">Assembly Constiuencies:</h1>
                                @if ($districts && $districts)
                                    @foreach ($districts as $district)
                                        <div class="rounded overflow-hidden border border-gray-700 my-5">
                                            <!-- accordion-tab  -->
                                            <div class="group outline-none accordion-section" tabindex="1">
                                                <div
                                                    class="group bg-gray-900 flex justify-between px-4 py-3 items-center transition ease duration-500 cursor-pointer pr-10 relative">
                                                    <div class="group-focus:text-white transition ease duration-500">
                                                        District: {{ $district->name }}
                                                    </div>
                                                    <div
                                                        class="h-8 w-8 border border-gray-700 rounded-full items-center inline-flex justify-center transform transition ease duration-500 group-focus:text-white group-focus:-rotate-180 absolute top-0 right-0 mb-auto ml-auto mt-2 mr-2">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div
                                                    class="group-focus:max-h-screen max-h-0 bg-gray-800 px-4 overflow-hidden ease duration-500">
                                                    <!-- component -->
                                                    <!-- This is an example component -->
                                                    <div class="mx-auto">

                                                        <div class="flex flex-col">
                                                            <div class="overflow-x-auto">
                                                                <div class="inline-block min-w-full align-middle">
                                                                    <div class="overflow-hidden ">
                                                                        <div
                                                                            class="p-2 grid md:grid-cols-3 lg:grid-cols-5 gap-2">
                                                                            @foreach ($district->constituencies as $constituency)
                                                                                <div
                                                                                    class="border border-gray-400 p-2 rounded text-center flex- flex-col items-center justify-center gap-2">

                                                                                    <p>
                                                                                        <a

                                                                                            href="{{ route('pollingstation.show', [$constituency->id]) }}">
                                                                                            {{ $constituency->name }}
                                                                                        </a>
                                                                                    </p>
                                                                                    <p>
                                                                                        Polling Stations:

                                                                                        {{ $constituency->polling_stations_count }}
                                                                                    </p>
                                                                                    @can('is_admin')
                                                                                        <div
                                                                                            class="flex items-center justify-around">
                                                                                            <a

                                                                                                href="{{ route('constituency.edit', [$constituency->id]) }}">Edit</a>
                                                                                            <form
                                                                                                action="{{ route('constituency.destroy', [$constituency->id]) }}"
                                                                                                onsubmit="return confirm('Warning: Are You Sure You Want To Delete This Data? Your Data Will Be Lost');"
                                                                                            method="POST">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button
                                                                                                    type="submit">Delete</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    @endcan
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                @endif

                            </div>

                            <div>

                                <h1 class="text-xl">Parlimentary Constiuencies:</h1>
                                {{-- North --}}


                                <div class="rounded overflow-hidden border border-gray-700 my-5">
                                    <!-- accordion-tab  -->
                                    <div class="group outline-none accordion-section" tabindex="1">
                                        <div
                                            class="group bg-gray-900 flex justify-between px-4 py-3 items-center transition ease duration-500 cursor-pointer pr-10 relative">
                                            <div class="group-focus:text-white transition ease duration-500">
                                                North
                                            </div>
                                            <div
                                                class="h-8 w-8 border border-gray-700 rounded-full items-center inline-flex justify-center transform transition ease duration-500 group-focus:text-white group-focus:-rotate-180 absolute top-0 right-0 mb-auto ml-auto mt-2 mr-2">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div
                                            class="group-focus:max-h-screen max-h-0 bg-gray-800 px-4 overflow-hidden ease duration-500">
                                            <!-- component -->
                                            <!-- This is an example component -->
                                            <div class="mx-auto">

                                                <div class="flex flex-col">
                                                    <div class="overflow-x-auto">
                                                        <div class="inline-block min-w-full align-middle">
                                                            <div class="overflow-hidden ">
                                                                <div
                                                                    class="p-2 grid md:grid-cols-3 lg:grid-cols-5 gap-2">

                                                                    <div
                                                                        class="border border-gray-400 p-2 rounded text-center flex- flex-col items-center justify-center gap-2">

                                                                        <p>

                                                                            Baramulla

                                                                        </p>


                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>





                                {{-- Central --}}
                                <div class="rounded overflow-hidden border border-gray-700 my-5">
                                    <!-- accordion-tab  -->
                                    <div class="group outline-none accordion-section" tabindex="1">
                                        <div
                                            class="group bg-gray-900 flex justify-between px-4 py-3 items-center transition ease duration-500 cursor-pointer pr-10 relative">
                                            <div class="group-focus:text-white transition ease duration-500">
                                                Central
                                            </div>
                                            <div
                                                class="h-8 w-8 border border-gray-700 rounded-full items-center inline-flex justify-center transform transition ease duration-500 group-focus:text-white group-focus:-rotate-180 absolute top-0 right-0 mb-auto ml-auto mt-2 mr-2">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div
                                            class="group-focus:max-h-screen max-h-0 bg-gray-800 px-4 overflow-hidden ease duration-500">
                                            <!-- component -->
                                            <!-- This is an example component -->
                                            <div class="mx-auto">

                                                <div class="flex flex-col">
                                                    <div class="overflow-x-auto">
                                                        <div class="inline-block min-w-full align-middle">
                                                            <div class="overflow-hidden ">
                                                                <div
                                                                    class="p-2 grid md:grid-cols-3 lg:grid-cols-5 gap-2">
                                                                    <div
                                                                        class="border border-gray-400 p-2 rounded text-center flex- flex-col items-center justify-center gap-2">

                                                                        <p>
                                                                            <a>

                                                                                Srinagar

                                                                            </a>
                                                                        </p>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                {{-- South --}}
                                <div class="rounded overflow-hidden border border-gray-700 my-5">
                                    <!-- accordion-tab  -->
                                    <div class="group outline-none accordion-section" tabindex="1">
                                        <div
                                            class="group bg-gray-900 flex justify-between px-4 py-3 items-center transition ease duration-500 cursor-pointer pr-10 relative">
                                            <div class="group-focus:text-white transition ease duration-500">
                                                South
                                            </div>
                                            <div
                                                class="h-8 w-8 border border-gray-700 rounded-full items-center inline-flex justify-center transform transition ease duration-500 group-focus:text-white group-focus:-rotate-180 absolute top-0 right-0 mb-auto ml-auto mt-2 mr-2">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div
                                            class="group-focus:max-h-screen max-h-0 bg-gray-800 px-4 overflow-hidden ease duration-500">
                                            <!-- component -->
                                            <!-- This is an example component -->
                                            <div class="mx-auto">

                                                <div class="flex flex-col">
                                                    <div class="overflow-x-auto">
                                                        <div class="inline-block min-w-full align-middle">
                                                            <div class="overflow-hidden ">
                                                                <div
                                                                    class="p-2 grid md:grid-cols-3 lg:grid-cols-5 gap-2">
                                                                        <div
                                                                            class="border border-gray-400 p-2 rounded text-center flex- flex-col items-center justify-center gap-2">

                                                                            <p>
                                                                                <a>
                                                                                   Anantnag
                                                                                </a>
                                                                            </p>


                                                                        </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
