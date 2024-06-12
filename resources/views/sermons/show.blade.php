@include('layouts.header')

<div class="container mx-auto text-white py-12 px-4">
    <a href="{{ route('sermons.index') }}" class="text-lg text-white p-2 bg-purple-600 shadow-lg rounded-lg hover:text-gray-200">Back to Sermons</a>
    <div class="block bg-blue-300 p-6 mt-3 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        <h3 class="text-3xl font-semibold mb-4">{{ $sermonVideo->title }}</h3>
        <video controls class="w-full">
            <source src="{{ asset($sermonVideo->video_url) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p class="leading-relaxed mb-4">{{ $sermonVideo->description }}</p>
    </div>
</div>