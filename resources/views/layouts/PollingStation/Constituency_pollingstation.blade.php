<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">

                    {{ $constituency->name }} {{ __('Constituency With Polling Stations') }}

            </h2>
            <x-secondary-button>
                <a href="{{ route('pollingstation.create') }}">
                    Create Polling Station
                </a>
            </x-secondary-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="text-white dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 ">
                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">SNO</th>
                                                <th scope="col" class="px-6 py-4">Locality</th>
                                                <th scope="col" class="px-6 py-4">Building Location</th>
                                                <th scope="col" class="px-6 py-4">Polling Area</th>
                                                <th scope="col" class="px-6 py-4">Total Votes</th>
                                                <th scope="col" class="px-6 py-4">Section Names</th>
                                                <th scope="col" class="px-6 py-4">Members</th>
                                                <th scope="col" class="px-6 py-4">Edit</th>
                                                <th scope="col" class="px-6 py-4">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($constituency->pollingstations as $pollingStation)
                                                <tr class="border-b dark:border-neutral-500">
                                                    <td class="whitespace-nowrap py-2 font-medium">
                                                        {{ $pollingStation->SNO }}</td>
                                                    <td class="whitespace-nowrap py-2">
                                                        {{ $pollingStation->locality }}</td>
                                                    <td class="whitespace-nowrap py-2">
                                                        {{ $pollingStation->building_location }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-2">
                                                        {{ $pollingStation->polling_area }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-2">
                                                        {{ $pollingStation->total_votes }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-2">
                                                        <ul>
                                                            @foreach ($pollingStation->sectionnames as $sectionname)
                                                                <li>
                                                                    {{ $sectionname->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                        @foreach ($pollingStation->sectionnames as $sectionname)
                                                            <li>
                                                                {{ $sectionname->members_count }}
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="whitespace-nowrap py-2">
                                                        <a
                                                            href="{{ route('pollingstation.edit', [$pollingStation->id]) }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </td>
                                                    <td class="whitespace-nowrap py-2">
                                                        <form
                                                            action="{{ route('pollingstation.destroy', [$pollingStation->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>


                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
