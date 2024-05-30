@include('layouts.header')

<main class="container text-white mx-auto py-6 pt-2 px-4">
    <h1 class="text-3xl font-bold mb-5">Clergy</h1>
    @if(auth()->check())
    <div class="flex justify-end">
        <a href="{{ route('workers.create') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg mb-2 inline-block">Add Clergy</a>
    </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($workers as $worker)
            @if($worker->type === 'clergy')
                <div class="bg-blue-300 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <img src="{{ asset('storage/' . $worker->image_path) }}" alt="{{ $worker->title }}" class="rounded-t-lg w-full h-64 object-cover">
                    <div class="p-4">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-bold">{{ $worker->name }}</h2>
                            <h2 class="text-xl text-purple-600 font-bold">{{ $worker->position }}</h2>
                        </div>
                        <p class="text-purple-700 line-clamp-1">{{ $worker->description }}</p>
                        <div class="flex justify-between mx-auto text-blue-600">
                            <a href="{{ route('workers.show', $worker->id) }}" class="bg-purple-700 text-white rounded-lg px-2 py-1 hover:underline">View Details</a>
                            @if(auth()->check())
                            <form action="{{ route('workers.destroy', $worker->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-2 rounded-lg">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <h1 class="text-3xl font-bold mb-5 mt-8">Other Workers</h1>
    @if(auth()->check())
    <div class="flex justify-end">
        <a href="{{ route('workers.create') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg mb-2 inline-block">Add Worker</a>
    </div> 
    @endif   
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($workers as $worker)
            @if($worker->type === 'other_workers')
                <div class="bg-blue-300 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <img src="{{ asset('storage/' . $worker->image_path) }}" alt="{{ $worker->title }}" class="rounded-t-lg w-full h-64 object-cover">
                    <div class="p-4">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-bold mb-2">{{ $worker->name }}</h2>
                            <h2 class="text-xl font-bold mb-2">{{ $worker->position }}</h2>
                        </div>
                        <p class="text-purple-700 line-clamp-1">{{ $worker->description }}</p>
                        <div class="flex justify-between mx-auto text-blue-600">
                            <a href="{{ route('workers.show', $worker->id) }}" class="bg-purple-700 text-white rounded-lg px-2 py-1 hover:underline">View Details</a>
                            @if(auth()->check())
                            <form action="{{ route('workers.destroy', $worker->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-2 rounded-lg">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</main>

@include('layouts.footer')
