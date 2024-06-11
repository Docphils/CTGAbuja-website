@include("layouts.header")

<main class="container mx-auto py-12 px-4 flex flex-col text-white lg:flex-row">

    

    <!-- Activities and Past Programs Section -->
    <section id="past-programs" class="lg:w-3/4 lg:mr-8 mb-12 lg:mb-0">

        <!-- Activity Section -->
    <section> 
        <h2 class="text-3xl font-bold my-6">Weekly Activities</h2>
        
        @if (auth()->check())
            <a href="{{ route('activities.create') }}" class="text-lg bg-blue-600 p-2 rounded-lg shadow-md font-bold mb-6">Add Activity</a>
        @endif

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-50 p-6 rounded-lg text-gray-800 shadow-sm  my-6">
            <table class="w-full text-left">
                <thead>
                    <tr class="font-bold text-lg">
                        <th class="py-2 px-4">Title</th>
                        <th class="py-2 px-4">Day</th>
                        <th class="py-2 px-4">Time</th>
                        @if (auth()->check())
                            <th class="py-2 px-4">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td class="py-2 px-4 relative group">
                                <button class="relative">
                                    {{ $activity->title }}
                                    <div class="absolute left-0 mb-1 w-64 p-2 text-sm text-white bg-blue-600 rounded-lg shadow-lg invisible group-hover:visible transition-opacity duration-300">
                                        {{ $activity->description }}
                                    </div>
                                </button>
                            </td>
                            <td class="py-2 px-4">{{ $activity->day }}</td>
                            <td class="py-2 px-4">{{ $activity->time_range }}</td>
                            @if (auth()->check())
                            <td class="py-2 px-4 flex text-white">
                                <a href="{{ route('activities.edit', $activity->id) }}" class="bg-blue-600 p-2  rounded-lg mr-2"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 p-2  rounded-lg"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!--Past Programs Section-->

        @if(auth()->check())
            <a href="{{ route('programs.create') }}" class="text-lg bg-blue-600 p-2 rounded-lg shadow-md font-bold mb-6">Add Program</a>
        @endif
        <h2 class="text-3xl font-bold mt-6 mb-6">Past Programs</h2>

        @foreach($pastPrograms as $program)
        <div class="grid grid-cols-3 mb-8 bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <div class="col-span-2">
                <h3 class="text-2xl text-gray-50 font-semibold">{{ $program->title }}</h3>
                <hr class="border-purple-600 border-2">
                <p class="leading-relaxed font-bold text-justify text-lg pr-3 line-clamp-2">{{ $program->description }}</p>
                <p class="leading-relaxed text-justify mt-4 mb-3 pr-3 line-clamp-2">{{ $program->details }}</p>
                <div class="flex justify-between">
                    <a href="{{ route('programs.show', $program->id) }}" class="bg-purple-600 font-bold p-1 px-2 rounded-lg justify-self-center text-xl mt-2 hover:bg-purple-400">Details</a>
                    <!-- Edit and Delete Links -->
                    <div class="flex gap-2 mr-3">
                        @if(auth()->check())
                        
                            <a href="{{ route('programs.edit', $program->id) }}" class="bg-blue-600 px-2 p-1 rounded-lg text-xl mt-2 hover:bg-blue-400">
                            <i class="fas fa-edit"></i>
                            </a>
                        
                            <a href="{{ route('programs.registrations', $program->id) }}" class="bg-yellow-500 px-2 p-1 rounded-lg text-xl mt-2 hover:bg-yellow-400">
                                <i class="fas fa-list"></i>
                            </a>

                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 px-2 p-1 rounded-lg text-xl mt-2 hover:bg-red-400">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                    @endif
                    
                    </div>
                </div>
            </div>
            @if($program->images->isNotEmpty())
                <div class="mt-4 h-48 flex-auto">
                    <img src="{{ asset('storage/' . $program->images->first()->image_path) }}" alt="{{ $program->title }}" class="rounded-lg mb-2 h-48 w-full">
                </div>
            @endif
        </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="mt-8 text-white">
            {{ $pastPrograms->links() }}
        </div>
    </section>

    <!-- Upcoming Programs Section -->
    <aside id="upcoming-programs" class="lg:w-1/4 bg-blue-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        <h2 class="text-3xl font-bold mb-2">Upcoming Programs</h2>
        <hr class="border-white border-4 mx-0 px-o mb-6">

        @foreach($upcomingPrograms as $program)
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-yellow-300 mb-2">{{ $program->title }}</h3>
                <p class="leading-relaxed font-bold mb-4 line-clamp-2">{{ $program->description }}</p>
                @if($program->images->isNotEmpty())
                    <div class="mt-4 mb-4 h-48 flex-auto">
                        <img src="{{ asset('storage/' . $program->images->first()->image_path) }}" alt="{{ $program->title }}" class="rounded-lg mb-2 h-48 w-full">
                    </div>
                @endif
                <p class="leading-relaxed mb-4 line-clamp-2">{{ $program->details }}</p>
                    <a href="{{ route('programs.registerForm', $program->id) }}" class="inline-block px-4 py-2 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                        Register Now
                    </a>
                    <a href="{{ route('programs.show', $program->id) }}" class="inline-block bg-purple-600 font-semibold py-2 px-4 rounded-lg text-lg ml-2 mt-2 hover:bg-purple-400">Details</a>
                    
                    <div class="flex justify-around">
                    @if(auth()->check())
                        
                    <a href="{{ route('programs.edit', $program->id) }}" class="bg-blue-300 p-2 px-3 rounded-lg text-xl mt-2 hover:bg-blue-400">
                    <i class="fas fa-edit"></i>
                    </a>
                
                    <a href="{{ route('programs.registrations', $program->id) }}" class="bg-yellow-500 p-2 px-3 rounded-lg text-xl mt-2 hover:bg-yellow-400">
                        <i class="fas fa-list"></i>
                    </a>

                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 p-2 px-3 rounded-lg text-xl mt-2 hover:bg-red-400">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                @endif
                </div>
                    <hr class="mt-2 border-yellow-400">
            </div>
        @endforeach
    </aside>
</main>

@include("layouts.footer")


<script src="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.1/tippy-bundle.umd.min.js"></script>
<script>
    tippy('[data-tippy-content]');
</script>