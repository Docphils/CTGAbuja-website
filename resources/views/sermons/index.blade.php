@include("layouts.header")


<main class="container mx-auto text-white py-12 px-4">
    <!-- Live Broadcast Section -->
    <section id="live-broadcast" class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Live Broadcast</h2>
        <div class="bg-purple-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <p class="text-lg leading-relaxed mb-4">
                Join our live broadcast to participate in the ongoing sermon. Click the button below to join now!
            </p>
            <a href="/live-broadcast" class="inline-block px-6 py-3 text-lg font-semibold animate-pulse text-white bg-red-600 rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                Join Live Broadcast
            </a>
        </div>
    </section>

    <!-- Previous Sermons Section -->
<div class="container mx-auto text-white py-12 px-4">
    <h2 class="text-3xl font-bold mb-6">Previous Sermons</h2>
    <div id="sermons-container">
        @foreach($videos as $video)
            @php
                $videoId = $video['id']['videoId'];
                $videoUrl = "https://www.youtube.com/watch?v=$videoId";
            @endphp
            <a href="{{ $videoUrl }}" target="_blank" class="block mb-8 bg-purple-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-white">
                    <h3 class="text-2xl font-semibold mb-2">{{ $video['snippet']['title'] }}</h3>
                    <p class="leading-relaxed mb-4">{{ $video['snippet']['description'] }}</p>
                </div>
                <div class="relative pb-16/9">
                    <iframe class="absolute top-0 left-0 w-full h-full rounded-lg" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </a>
        @endforeach
    </div>
</div>
</main>


@include("layouts.footer")