<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create Polling Station') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('constituency.index') }}">
                    View Polling Station
                </a>
            </x-secondary-button>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}.
        </div>
    @endif

    <div class="py-12 px-4">
        <div class=" mx-auto">
            <div class=" dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class=" text-gray-700 dark:text-gray-300">




                    <form action="{{ route('section.store') }}" method="POST"  class="border p-4 rounded  border-gray-700">

                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-white">
                                Section Name:
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ">

                            @error('name')
                                <span class="text-red-500">{{ $errors->first('name') }}</span>
                            @enderror
                        </div>

                    <div class="mb-6">
                        <label
                            class="font-semibold block  text-sm text-gray-700 text-white  py-2"
                            for="constituency">Section Constituency<abbr
                                title="required"></label>
                        <select id="constituency"
                                class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ">
                            @if (count($constituencies) > 0)

                                <option value="">Select Constituency</option>
                                @foreach ($constituencies as $constituency)
                                    <option value="{{ $constituency->id }}">{{ $constituency->name }}
                                    </option>
                                @endforeach
                            @else

                            @endif
                        </select>

                    </div>

                        <div class="mb-6">
                            <label
                                class="font-semibold block  text-sm text-gray-700 text-white  py-2"
                                for="constituency">Section Polling Station(Locality)<abbr
                                    title="required"></label>
                            <select id="polling_station_id"  name="polling_station_id"
                                class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ">
                                <option>Select Polling Station(Locality)</option>
                            </select>
                            @error('polling_station_id')
                                <span class="text-red-500">{{ $errors->first('polling_station_id') }}</span>
                            @enderror
                        </div>


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var constituencySelect = document.getElementById('constituency');
            var pollingStationSelect = document.getElementById('polling_station_id');

            constituencySelect.addEventListener('change', function () {
                var selectedConstituencyId = this.value;

                // Make an AJAX request to fetch polling stations based on the selected constituency
                fetch('{{ url('/pollingstation/fetch-sections') }}/' + selectedConstituencyId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        // Clear existing options
                        pollingStationSelect.innerHTML = '';

                        // Add options based on the fetched data
                        data.forEach(pollingStation => {
                            var option = document.createElement('option');
                            option.value = pollingStation.id;
                            option.textContent = pollingStation.locality;
                            pollingStationSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
</x-app-layout>


