<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                @if ($district)
                    District {{ $district->name }} With Constituencies
                @endif
            </h2>
            <x-secondary-button>
                <a href="{{ route('district.index') }}">
                    View Districts
                </a>
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 text-white grid md:grid-cols-4 lg:grid-cols-6">



                    @if ($district)
                        @foreach ($district->constituencies as $constituency)
                            <div class="border border-gray-600 rounded p-2 text-center">
                                <a href="{{ route('pollingstation.show', [$constituency->id]) }}">
                                    {{ $constituency->name }}
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h1>No Districts Awailable</h1>
                    @endif





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
