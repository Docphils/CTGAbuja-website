@include('layouts.header')

<main class="container mx-auto py-12 px-4 w-1/2">
    <h1 class="text-4xl font-bold mb-8 text-white">Edit Contact Information</h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('contact-info.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="phone" class="block text-lg font-medium mb-2">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" value="{{ $contactInfo ? $contactInfo->phone : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" value="{{ $contactInfo ? $contactInfo->email : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="facebook" class="block text-lg font-medium mb-2">Facebook</label>
                <input type="url" id="facebook" name="facebook" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" value="{{ $contactInfo ? $contactInfo->facebook : '' }}">
            </div>
            <div class="mb-4">
                <label for="instagram" class="block text-lg font-medium mb-2">Instagram</label>
                <input type="url" id="instagram" name="instagram" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" value="{{ $contactInfo ? $contactInfo->instagram : '' }}">
            </div>
            <div class="mb-4">
                <label for="youtube" class="block text-lg font-medium mb-2">Youtube</label>
                <input type="url" id="youtube" name="youtube" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" value="{{ $contactInfo ? $contactInfo->youtube : '' }}">
            </div>
            <div class="mb-4">
                <label for="counseling_hours" class="block text-lg font-medium mb-2">Counseling Hours</label>
                <textarea id="counseling_hours" name="counseling_hours" rows="4" class="w-full text-gray-900 p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" required>{{ $contactInfo ? $contactInfo->counseling_hours : '' }}</textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-purple-700 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                Update Contact Info
            </button>
        </form>
    </div>
</main>

@include('layouts.footer')
