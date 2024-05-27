<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold mb-4 text-center">
            {{ __('Edit Ministry') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 px-4">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ministries.update', $ministry->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Ministry Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $ministry->name }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $ministry->description }}</textarea>
            </div>

            <!-- Add existing image display and upload field -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $ministry->image_path) }}" alt="{{ $ministry->name }}" class="w-full h-auto mb-2">
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="facebook_url" class="block text-gray-700 text-sm font-bold mb-2">Facebook URL</label>
                <input type="url" name="facebook_url" id="facebook_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $ministry->facebook_url }}">
            </div>

            <div class="mb-4">
                <label for="instagram_url" class="block text-gray-700 text-sm font-bold mb-2">Instagram URL</label>
                <input type="url" name="instagram_url" id="instagram_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $ministry->instagram_url }}">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Ministry
                </button>
                <a href="{{ route('ministries.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</x-app-layout>
