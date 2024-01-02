<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Update Profile Photo') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.admin_update_photo') }}" class="mt-6 space-y-6"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="flex flex-col items-start gap-3 justify-start w-full">

            <div id="imagePreview" class="border border-dashed rounded h-20 w-24 cursor-pointer border-gray-600"></div>

            <label for="dropzone-file" id="uploadButton"
                   class="cursor-pointer  text-white p-2 hover:bg-gray-700 duration-75 transition-all delay-75 text-sm bg-gray-800  rounded">
                Upload Photo
            </label>

            <input type="file" id="dropzone-file"  class="hidden" name="photo" onchange="previewImage()">

        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')

                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>

            @endif

        </div>

    </form>


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
                    previewImage.src = e.target.result;
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(previewImage);
                }

                reader.readAsDataURL(imageInput);
            }
        }
    </script>

</section>
