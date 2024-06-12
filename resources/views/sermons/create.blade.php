<!-- resources/views/sermons/create.blade.php -->
@include('layouts.header')

<main class="container mx-auto text-white py-12 px-4 w-1/2 shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold mb-6">Upload Sermon Video</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sermons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="w-full text-gray-800 rounded-lg px-4 py-2" value="{{ old('title') }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Description:</label>
            <textarea name="description" id="description" rows="3" class="w-full text-gray-800 rounded-lg px-4 py-2">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="video" class="block text-lg font-semibold mb-2">Video File:</label>
            <input type="file" name="video" id="video" accept="video/*" class="w-full rounded-lg px-4 py-2">
        </div>
        <div class="mb-4">
            <button type="submit" class="inline-block px-4 py-1 text-lg font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">Upload</button>
        </div>
    </form>
</main>

@include('layouts.footer')
