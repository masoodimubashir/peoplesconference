<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create Member') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('member.index') }}">
                    View Member
                </a>
            </x-secondary-button>
        </div>
    </x-slot>


    <div class="py-12 p-4">
        <div class=" mx-auto sm:px-4 ">
            <div class=" sm:rounded">
                <div class=" text-gray-700 dark:text-gray-300">


                    @if (session('success'))
                        <div
                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif


                    <!-- component -->
                    <div class=" min-h-screen flex items-center justify-center bg-center text-white">
                        <div class=" bg-black opacity-60 inset-0 z-0"></div>
                        <div class=" w-full space-y-8">
                            <form class="grid  gap-8 grid-cols-1 border p-4 rounded  border-gray-700"
                                  action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-col ">
                                    <div class="flex flex-col sm:flex-row items-center">
                                        <h2 class="font-semibold text-lg mr-auto">Member Detail</h2>
                                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="form">
                                            <div class="md:space-y-2 mb-3">
                                                <div class="flex items-center py-6">
                                                    <div
                                                        class="w-20 h-20 mr-4 flex-none rounded-xl border overflow-hidden">

                                                            <div id="imagePreview" class="w-20 h-20 mr-4 object-cover" >

                                                            </div>

                                                    </div>
                                                    <label class="cursor-pointer ">
                                                        <span id="photo"
                                                              class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                                        <input type="file" id="dropzone-file"  class="hidden" name="photo" onchange="previewImage()">

                                                    </label>
                                                    <p class="text-red-600">{{ $errors->first('photo') }}</p>

                                                </div>
                                            </div>

                                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold  py-2" for="name">Member
                                                        Name</label>
                                                    <input placeholder="Member Name"
                                                           class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  "
                                                           type="text" name="name" id="name"
                                                           value="{{ old('name') }}">
                                                    <p class="text-red-600">{{ $errors->first('name') }}</p>
                                                </div>
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold  py-2" for="email">
                                                        Email
                                                    </label>
                                                    <input placeholder="Email ID"
                                                           class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                                                 block w-full p-2.5 dark:bg-gray-700
                                                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  "
                                                           type="email" name="email" id="email"
                                                           value="{{ old('email') }}">
                                                    <p class="text-red-600">{{ $errors->first('email') }}</p>

                                                </div>
                                            </div>

                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold  py-2" for="gender">Gender<abbr
                                                            title="required"></label>
                                                    <select
                                                        class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white   "
                                                        name="gender" id="gender">
                                                        <option value="">Gender</option>
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                    <p class="text-red-600">{{ $errors->first('gender') }}</p>

                                                </div>
                                                <div class=" space-y-2 w-full text-xs pt-2">
                                                    <label class="font-semibold  py-2" for="phone">
                                                        Phone Number <abbr title="required"></label>
                                                    <input placeholder="phone ID"
                                                           class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  "
                                                           type="number" name="phone" id="phone"
                                                           value="{{ old('phone') }}">
                                                    <p class="text-red-600">{{ $errors->first('phone') }}</p>

                                                </div>

                                            </div>


                                            <div class="mb-6">
                                                <label
                                                    class="font-semibold block  text-sm text-white  py-2"
                                                    for="constituency">Select Polling Station(Locality)<abbr
                                                        title="required"></label>
                                                <select id="polling_station_id"
                                                        class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white ">
                                                    @if ($pollingstations)

                                                        <option value="">Select Polling Station(Locality)</option>
                                                        @foreach ($pollingstations as $key => $value)
                                                            <option value="{{ $value }}">{{$key}}</option>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </select>

                                            </div>

                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                                <div class="w-full flex flex-col mb-3">
                                                    <label
                                                        class="font-semibold block  text-sm text-white  py-2"
                                                        for="constituency">Select Section Names<abbr
                                                            title="required"></label>
                                                    <select
                                                        class="bg-gray-700 border border-gray-800 text-gray-100 text-sm rounded-lg
                                                             block w-full p-2.5 dark:bg-gray-700
                                                                dark:border-gray-600 dark:placeholder-gray-700 dark:text-white  "
                                                        name="section_name_id" id="section_name_id">
                                                        <option>Select Section Names</option>
                                                    </select>
                                                    <p class="text-red-600">{{ $errors->first('section_name_id') }}
                                                    </p>

                                                </div>
                                            </div>

                                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                                <button type="submit"
                                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let selectedPollingStationItem = document.querySelector('#polling_station_id');
            let sectionSelected = document.querySelector('#section_name_id');

            selectedPollingStationItem.addEventListener('change', function () {
                let selectedPollingStationId = this.value;

                fetch('{{ url('/member/fetch-members') }}/' + selectedPollingStationId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        // Clear existing options
                        sectionSelected.innerHTML = '';

                        data.forEach(section => {
                            let option = document.createElement('option');
                            option.value = section.id;
                            option.textContent = section.name;
                            sectionSelected.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            });
        });
    </script>

    <script>
        function previewImage() {
            const previewContainer = document.getElementById('imagePreview');

            console.log(previewContainer)

            const imageInput = document.getElementById('dropzone-file').files[0];

            // Ensure that a file is selected
            if (imageInput) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    var previewImage = document.createElement('img');
                    previewImage.style.height = '100%'
                    previewImage.src = e.target.result
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(previewImage);
                }

                reader.readAsDataURL(imageInput);
            }
        }
    </script>


</x-app-layout>
