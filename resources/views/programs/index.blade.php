
@include("layouts.header")

<main class="container mx-auto py-12 px-4 flex flex-col text-white lg:flex-row">

    <!-- Past Programs Section -->
    <section id="past-programs" class="lg:w-3/4 lg:mr-8 mb-12 lg:mb-0">
        <a href="{{ route('programs.create') }}" class="text-lg bg-blue-600 p-2 rounded-lg shadow-md font-bold mb-6">Add Program</a>
        <h2 class="text-3xl font-bold mt-6 mb-6">Past Programs</h2>

        @foreach($pastPrograms as $program)
            <div class="grid grid-cols-3 mb-8 bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                <div class="">
                    <h3 class="text-2xl text-gray-50 font-semibold">{{ $program->title }}</h3> <hr class="text-yellow-400 font-bold">
                    <p class="leading-relaxed">{{ $program->description }}</p>
                    <p class="leading-relaxed mt-4 mb-3">{{ $program->details }}</p>
                    <a href="{{ route('programs.show', $program->id)}}" class="bg-purple-600 font-bold p-1 rounded-lg justify-self-center text-xl mt-2 hover:bg-purple-400">Details</a>
                </div>
                @if($program->images)
                    <div class="mt-4 h-48 cols-span-2 flex gap-1 w-full">
                        @foreach($program->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $program->title }}" class="rounded-lg mb-2 w-full">
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </section>

    <!-- Upcoming Programs Section -->
    <aside id="upcoming-programs" class="lg:w-1/4 bg-blue-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        <h2 class="text-3xl font-bold mb-6">Upcoming Programs</h2>

        @foreach($upcomingPrograms as $program)
            <div class="mb-6">
                <h3 class="text-2xl font-semibold mb-2">{{ $program->title }}</h3>
                <p class="leading-relaxed mb-4">{{ $program->description }}</p>
                @if($program->registration_link)
                    <a href="{{ $program->registration_link }}" class="inline-block px-4 py-2 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                        Register Now
                    </a>
                @endif
            </div>
        @endforeach
    </aside>
</main>

@include("layouts.footer")
