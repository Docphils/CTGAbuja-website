@include('layouts.header')
    <div class="container mx-auto text-white py-12 px-4">
        <h2 class="text-3xl font-bold mb-6">All Sermon Videos</h2>
        <form action="{{ route('sermons.search') }}" method="POST" class="mb-6">
            @csrf
            <input type="text" name="search" placeholder="Search videos by title" class="px-4 py-2 rounded-lg text-black w-full sm:w-1/2 lg:w-1/3">
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 rounded-lg text-white">Search</button>
        </form>
        <div id="sermons-container" class="grid grid-cols-1 mb-3 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($sermonVideos as $video)
                <div class="block bg-purple-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <a href="{{ route('sermons.show', $video->id) }}" class="text-white mb-4">
                        <h3 class="text-2xl font-semibold mb-2">{{ $video->title }}</h3>
                    </a>
                    <video controls class="w-full">
                        <source src="{{ asset($video->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p class="leading-relaxed line-clamp-2">{{ $video->description }}</p>
                    @if (auth()->check())
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('sermons.edit', $video->id) }}" class="text-lg text-white hover:text-gray-200">Edit</a>
                            <form action="{{ route('sermons.destroy', $video->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-lg text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    @endif
                    
                </div>
            @endforeach
        </div>
        <a href="{{ route('sermons.index') }}" class="text-lg text-white p-2 bg-purple-600 shadow-lg rounded-lg hover:text-gray-200">Back to Sermons</a>

        <div class="mt-6">
            {{ $sermonVideos->links() }}
        </div>
    </div>

@include('layouts.footer')