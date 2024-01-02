<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Home') }}
            </h2>
            <x-secondary-button>
                home
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                
                <div class="grid md:grid-cols-3 px-2  gap-4 w-full">

                    <div>
                        <img class="h-96 w-full rounded-lg" src="{{ asset('WebImages/Sajad Lone.jpeg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-96 w-full rounded-lg"
                            src="{{ asset('WebImages/Asif.png') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-96 w-full rounded-lg" src="{{ asset('WebImages/imran.jpg') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
