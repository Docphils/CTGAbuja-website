@include("layouts.header")

<main class="container text-white mx-auto py-12 px-4 pt-4">
    @if(auth()->check())
        <a class="bg-blue-500 text-white px-4 py-2 rounded-lg" href="{{ route('ministries.create') }}">Add Ministry</a>
    @endif


    @foreach ($ministries as $ministry)
        <section id="{{ strtolower(str_replace(' ', '-', $ministry->name)) }}" class="mb-12">
            <h2 class="text-3xl font-bold mb-4 mt-4">{{ $ministry->name }}</h2>
            <div class="bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <img class="w-full h-64 object-cover rounded-lg mb-4" src="{{ asset('storage/' . $ministry->image_path) }}" alt="{{ $ministry->name }}">
                <p class="text-lg leading-relaxed mb-4 line-clamp-1">
                    {{ $ministry->description }}
                </p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('ministries.show', $ministry->id) }}"                        "
                        class="inline-block px-6 py-3 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                        Learn More
                    </a>
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
                        @if(auth()->check())
                            <a href="{{ route('ministries.edit', $ministry->id) }}" class="text-white bg-yellow-300 px-4 py-2 rounded-lg hover:bg-yellow-500">
                                Edit
                            </a>
                            <form action="{{ route('ministries.destroy', $ministry->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-800">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endforeach
</main>
@include("layouts.footer")
