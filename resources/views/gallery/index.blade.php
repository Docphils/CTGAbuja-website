@include('layouts.header')
<main class="container text-white mx-auto py-6 pt-2 px-4">
    <h1 class="text-4xl font-bold mb-8">Gallery</h1>
    @if (auth()->check())
        <a href="{{ route('gallery.create') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg mb-6 inline-block">Upload Images</a>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">

        @foreach($galleries->items() as $gallery)
            <div class="bg-blue-300 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out relative">
                <a href="{{ route('gallery.show', $gallery->id) }}">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="rounded-t-lg w-full h-auto max-h-56 object-cover">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300 ease-in-out bg-black bg-opacity-50">
                        <p class="text-white text-lg font-semibold">{{ $gallery->title }}</p>
                    </div>
                </a>
                    @if (auth()->check())
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="absolute top-0 right-0 text-white text-lg bg-transparent opacity-50 mr-4 hover:opacity-100 border-none">
                                <i class="fa fa-trash" aria-hidden="true"></i> <!-- Font Awesome trash icon -->
                            </button>
                        </form>
                    @endif
            </div>
        @endforeach

    
    </div>
    <div class="mt-4">
        {{ $galleries->links() }}
    </div>

</main>
@include('layouts.footer')