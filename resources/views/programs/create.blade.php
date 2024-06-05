<!-- resources/views/programs/create.blade.php -->

@include("layouts.header")

<main class="container mx-auto py-12 px-4 shadow-lg text-white w-1/2">
    <h2 class="text-3xl font-bold mb-6">Create New Program</h2>

    @if($errors->any())
        <div class="mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2 ">Title</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="details" class="block text-lg font-semibold mb-2">Details</label>
            <textarea name="details" id="details" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" rows="6">{{ old('details') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="is_upcoming" class="block text-lg font-semibold mb-2">Is Upcoming?</label>
            <select name="is_upcoming" id="is_upcoming" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg">
                <option value="0" {{ old('is_upcoming') == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_upcoming') == '1' ? 'selected' : '' }}>Yes</option>
            </select>
        </div>
        <div class="mb-4" id="registration-link-wrapper" style="display: none;">
            <label for="registration_link" class="block text-lg font-semibold mb-2">Registration Link</label>
            <input type="url" name="registration_link" id="registration_link" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ old('registration_link') }}">
        </div>
        <div class="mb-4">
            <label for="images" class="block text-lg font-semibold mb-2">Images</label>
            <input type="file" name="images[]" id="images" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" multiple>
        </div>
        <div class="mb-4 text-right">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-lg">Create Program</button>
        </div>
    </form>
</main>

<script>
    // Show/hide the registration link input based on the 'is_upcoming' value
    document.getElementById('is_upcoming').addEventListener('change', function() {
        var registrationLinkWrapper = document.getElementById('registration-link-wrapper');
        if (this.value == '1') {
            registrationLinkWrapper.style.display = 'block';
        } else {
            registrationLinkWrapper.style.display = 'none';
        }
    });
</script>

@include("layouts.footer")
