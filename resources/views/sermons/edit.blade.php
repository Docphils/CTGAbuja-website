<!-- resources/views/sermons/edit.blade.php -->
@include('layouts.header')

<main class="container mx-auto text-white py-12 w-1/2 rounded-lg shadow-lg px-4">
    <h2 class="text-3xl font-bold mb-6">Edit Sermon Video</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sermons.update', $sermonVideo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="w-full text-gray-800 rounded-lg px-4 py-2" value="{{ old('title', $sermonVideo->title) }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Description:</label>
            <textarea name="description" id="description" rows="3" class="w-full text-gray-800 rounded-lg px-4 py-2">{{ old('description', $sermonVideo->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label for="video" class="block text-lg font-semibold mb-2">Video File:</label>
            <input type="file" name="video" id="video" accept="video/*" class="w-full rounded-lg px-4 py-2">
            <p class="mt-2 text-gray-400">Current video: <a href="{{ $sermonVideo->video_url }}" target="_blank" class="text-blue-400 hover:text-blue-600">Watch Video</a></p>
        </div>
        <div class="mb-4 text-right">
            <button type="submit" class="inline-block px-4 py-1 text-lg font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">Update</button>
        </div>
    </form>
</main>

@include('layouts.footer')
