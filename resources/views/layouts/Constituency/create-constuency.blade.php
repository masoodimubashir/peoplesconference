<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white">
                {{ __('Create Constituency') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('constituency.index') }}">

                    View Constituency
                </a>
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" text-white border p-4 rounded  border-gray-700  overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif

                    <form action="{{ route('constituency.store') }}" method="POST">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-2">
                            <div class="relative z-0 w-full mb-6 group">

                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-white">Select an
                                    option</label>
                                <select id="countries" name="type"
                                    class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
                                    block w-full p-2.5 dark:bg-gray-700 
                                    dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ">
                                    <option>Choose Constituency</option>
                                    <option value="A">Assembly</option>
                                    <option value="P">Parlimentary</option>
                                </select>


                                @error('type')
                                    <span class="text-red-500">{{ $errors->first('type') }}</span>
                                @enderror

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                @if ($districts)
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-white">Select an
                                        option</label>
                                    <select id="countries" name="district_id"
                                        class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
                                        block w-full p-2.5 dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  ">
                                        <option>Choose District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-white">Select an
                                        option</label>
                                    <select id="countries"
                                        class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
                                        block w-full p-2.5 dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  ">
                                        <option>Choose District</option>
                                    </select>

                                @endif
                                @error('error')
                                    <span class="font-medium">Error!: {{ $message }}.</span>
                                @enderror
                                @error('district_id')
                                    <span class="text-red-500">{{ $errors->first('district_id') }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-white">
                                    Constituency Name:
                                </label>
                                <input type="text" id="default-input" name="name"
                                    class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
                                    block w-full p-2.5 dark:bg-gray-700 
                                    dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  ">
                                @error('name')
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @enderror


                            </div>

                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
