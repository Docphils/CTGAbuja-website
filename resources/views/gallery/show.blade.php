@include('layouts.header')

<main class="container  text-white mx-auto py-0 px-4">
    <div class="grid grid-cols-1 md:grid-cols-4 mx-auto text-center">
        <div class=""></div>
        <div class="col-span-2"> 
            <div class="mx-auto">
                <h1 class="text-2xl text-start font-bold mb-3">{{ $gallery->title }}</h1>
                <div class="bg-blue-300 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out mb-4">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="rounded-t-lg w-full h-full max-h-96 object-cover">
                    <div class="p-4">
                        <p class=" text-start text-white">{{ $gallery->description }}</p>
                    </div>
                </div>
                <div class="text-start">
                    <a href="{{ route('gallery.index') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg">Back to Gallery</a>
                </div>
            </div>
        </div>
        <div class=""></div>
    </div>
</main>
@include('layouts.footer')