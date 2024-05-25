@include('layouts.header')
<main class="container text-white mx-auto py-6 pt-2 px-4">
    <h1 class="text-4xl font-bold mb-8">Gallery</h1>
    <a href="{{ route('gallery.create') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg mb-6 inline-block">Add New Gallery Item</a>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($galleries as $gallery)
        <div class="bg-blue-300 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="rounded-t-lg w-full h-auto max-h-64 object-cover">
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-2">{{ $gallery->title }}</h2>
                <p class="text-purple-700 line-clamp-1">{{ $gallery->description }}</p>
                <div class="flex justify-between mx-auto text-blue-600">
                    <a href="{{ route('gallery.show', $gallery->id) }}" class=" bg-purple-700 text-white rounded-lg px-2 py-1 hover:underline">View Details</a>
                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white py-1 px-2 rounded-lg">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@include('layouts.footer')