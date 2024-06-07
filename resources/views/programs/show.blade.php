@include("layouts.header")

<main class="container mx-auto py-12 px-4 text-white">
    <h2 class="text-3xl font-bold mb-6">{{ $program->title }}</h2>

    <div class="bg-blue-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        <p class="leading-relaxed font-bold text-justify text-lg mb-4">{{ $program->description }}</p>
        <p class="leading-relaxed text-justify mb-4">{{ $program->details }}</p>

        @if($program->images->isNotEmpty())
            <div class="grid grid-cols-3 gap-4">
                @foreach($program->images as $image)
                    <div class="col-span-1">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $program->title }}" class="rounded-lg w-full h-64">
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('programs.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">Back to Programs</a>
    </div>
</main>

@include("layouts.footer")