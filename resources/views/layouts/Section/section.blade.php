<x-app-layout>

    <x-title>
        Polling Station
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('All Sections') }}
            </h2>
            @can('is_admin')
                <x-secondary-button>
                    <a href="{{ route('section.create') }}">
                        Create Section
                    </a>

                </x-secondary-button>
            @endcan
        </div>

    </x-slot>

    <div class="py-12 px-4">
        <div class=" mx-auto  ">
            <form action="{{ route('section.index') }}" method="GET">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search"
                           id="default-search"
                           name="query"
                           value="{{old('query')}}"
                           class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search ...">
                    <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>
            </form>
            <div class=" overflow-hidden  sm:rounded">
                <div class=" text-gray-900 dark:text-gray-100">

                    @if (session('error'))
                        <div
                            class=" mt-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                            <x-error>
                                <span class="font-medium mt-4">Error!:</span>
                                {{ session('error') }}
                            </x-error>
                        </div>
                    @endif


                    @if (session('success'))
                        <div
                            class="p-4 mt-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span>
                            {{ session('success') }}.
                        </div>
                    @endif


                    <div class="flex justify-center text-white">
                        <div class="container mx-auto ">
                            <div class=" min-h-[400px]">
                                <div class="rounded overflow-hidden border border-gray-700 my-5 ">
                                    <!-- accordion-tab  -->
                                    <div class="mx-auto">
                                        <div class="flex flex-col">
                                            <div class="overflow-x-auto">
                                                <div class="inline-block min-w-full align-middle">
                                                    <div class="overflow-hidden ">
                                                        <div class="p-2 ">
                                                            <div class="overflow-x-auto">

                                                                <table
                                                                    class="min-w-full text-left text-sm font-light">
                                                                    <thead
                                                                        class="border-b font-medium dark:border-neutral-500">
                                                                    <tr>
{{--                                                                        <th scope="col"--}}
{{--                                                                            class="px-6 py-4">--}}
{{--                                                                            ID--}}
{{--                                                                        </th>--}}
                                                                        <th scope="col"
                                                                            class="px-6 py-4">
                                                                            Polling Station(Locality)

                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-4">
                                                                            Section Name

                                                                        </th>


                                                                        @can('is_admin')
                                                                            <th scope="col"
                                                                                class="px-6 py-4">
                                                                                Edit
                                                                            </th>
                                                                            <th scope="col"
                                                                                class="px-6 py-4">
                                                                                Delete
                                                                            </th>
                                                                        @endcan

                                                                    </tr>
                                                                    </thead>
                                                                    @foreach($pollingstations as $pollingstation)

                                                                        <tbody>

                                                                        <tr
                                                                            class="border-b dark:border-neutral-500">
{{--                                                                            <td--}}
{{--                                                                                class="whitespace-nowrap px-6 py-4 font-medium">--}}
{{--                                                                                <ul class="list-disc">--}}

{{--                                                                                    @foreach($pollingstation->sectionnames as $sectionname)--}}
{{--                                                                                        <li>--}}
{{--                                                                                            {{$sectionname->id}}--}}
{{--                                                                                        </li>--}}
{{--                                                                                    @endforeach--}}

{{--                                                                                </ul>--}}
{{--                                                                            </td>--}}
                                                                            <td
                                                                                class="whitespace-nowrap px-6 py-4">

                                                                                {{$pollingstation->locality}}

                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-6 py-4">

                                                                                <ul class="list-disc">

                                                                                    @foreach($pollingstation->sectionnames as $sectionname)

                                                                                        <li>
                                                                                            {{$sectionname->name}}
                                                                                        </li>

                                                                                    @endforeach
                                                                                </ul>


                                                                            </td>


                                                                            @can('is_admin')
                                                                                <td class="whitespace-nowrap px-6 py-4 flex flex-col gap-1">

                                                                                    @foreach($pollingstation->sectionnames as $sectionname)

                                                                                        <a
                                                                                            href="{{route('section.edit', [$sectionname->id])}}">
                                                                                            <i
                                                                                                class="fa-solid fa-pen-to-square"></i>

                                                                                        </a>
                                                                                    @endforeach
                                                                                </td>


                                                                                <td
                                                                                    class="whitespace-nowrap px-6 py-4">
                                                                                    @foreach($pollingstation->sectionnames as $sectionname)
                                                                                        <form
                                                                                            action="{{route('section.destroy', [$sectionname->id])}}"
                                                                                            onsubmit="return confirm('Warning: Are You Sure You Want To Delete This Data? Your Data Will Be Lost');"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button
                                                                                                type="submit">
                                                                                                <i
                                                                                                    class="fa-solid fa-trash"></i>
                                                                                            </button>

                                                                                        </form>
                                                                                    @endforeach

                                                                                </td>

                                                                            @endcan
                                                                        </tr>


                                                                        </tbody>

                                                                    @endforeach

                                                                </table>

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
                    {{$pollingstations->links()}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
