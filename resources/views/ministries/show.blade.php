@include('layouts.header')
        <h2 class="text-3xl text-white font-bold mb-2 text-center">
            {{ $ministry->name }}
        </h2>

    <div class="container mx-auto w-2/3 py-6 px-4">
        <div class="bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-full object-cover rounded-lg mb-4" src="{{ asset('storage/' . $ministry->image_path) }}" alt="{{ $ministry->name }}">
            <p class="text-lg text-white leading-relaxed mb-4">
                {{ $ministry->description }}
            </p>
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-4">
                    @if ($ministry->facebook_url)
                        <a href="{{ $ministry->facebook_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                    @endif
                    @if ($ministry->instagram_url)
                        <a href="{{ $ministry->instagram_url }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    @endif
                </div>
                @if (auth()->check())
                    <div class="flex space-x-2">
                        <a href="{{ route('ministries.edit', $ministry->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('ministries.destroy', $ministry->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <a href="{{ route('ministries.index') }}" class="inline-block align-baseline font-bold text-lg text-purple-600 hover:text-blue-800">
                Back to Ministries
            </a>
        </div>
    </div>
@include('layouts.footer')
