@include('layouts.header')

<main class="container mx-auto text-white py-12 px-4">
    <!-- Live Broadcast Section -->
    <section id="live-broadcast" class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Live Broadcast</h2>
        <div class="bg-purple-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <p class="text-lg leading-relaxed mb-4">
                Join our live broadcast to participate in the ongoing sermon. Click the button below to join now!
            </p>
            @if ($liveBroadcast)
                @php
                    $liveVideoId = $liveBroadcast['id']['videoId'];
                    $liveVideoUrl = "https://www.youtube.com/watch?v=$liveVideoId";
                @endphp
                <a href="{{ $liveVideoUrl }}" target="_blank" class="inline-block px-6 py-3 text-lg font-semibold animate-pulse text-white bg-red-600 rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                    Join Live Broadcast
                </a>
            @else
                <button disabled class="inline-block px-6 py-3 text-lg font-semibold text-white bg-gray-400 rounded-lg shadow-md">
                    No Live Broadcast
                </button>
            @endif
        </div>
    </section>

    <!-- Previous Sermons Section -->
    <section id="previous-sermons" class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Previous Sermons</h2>
        <div id="sermons-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Display YouTube videos -->
            @foreach($videos as $video)
                @php
                    $videoId = $video['id']['videoId'];
                    $videoUrl = "https://www.youtube.com/watch?v=$videoId";
                @endphp
                <div class="block bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <a href="{{ $videoUrl }}" target="_blank" class="text-white mb-4">
                        <h3 class="text-2xl font-semibold mb-2">{{ $video['snippet']['title'] }}</h3>
                        <p class="leading-relaxed">{{ $video['snippet']['description'] }}</p>
                    </a>
                    <div class="relative overflow-hidden rounded-lg" style="padding-top: 56.25%;"> <!-- 16:9 aspect ratio -->
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            @endforeach

            <!-- Display videos from the database -->
            @foreach($sermonVideos as $video)
                <div class="block bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <h3 class="text-2xl font-semibold mb-2">{{ $video->title }}</h3>
                    <p class="leading-relaxed">{{ $video->description }}</p>
                    <video controls class="w-full">
                        <source src="{{ asset($video->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('sermons.edit', $video->id) }}" class="text-lg text-white hover:text-gray-200">Edit</a>
                        <form action="{{ route('sermons.destroy', $video->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-lg text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>

@include('layouts.footer')
