<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Edit District') }}
            </h2>
            <x-secondary-button>

                <a href="{{ url('/district') }}">
                    Show Districts
                </a>

            </x-secondary-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-full mx-auto  max-w-3xl" action="{{ url('district', [$district->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full ">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"
                                    for="district">
                                    District Name
                                </label>
                                <input
                                    class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg 
                                    block w-full p-2.5 dark:bg-gray-700 
                                    dark:border-gray-600 dark:placeholder-gray-700 dark:text-white"
                                    id="district" type="text" name="name" value="{{ $district->name }}">

                                @error('name')
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @enderror


                            </div>
                            <div class="mt-4">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
