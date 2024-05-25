@include('layouts.header')

<main class="container text-white mx-auto py-6 pt-2 px-4">
    <h1 class="text-3xl font-bold mb-8">{{ $worker->type === 'clergy' ? 'Clergy' : 'Other Worker' }}</h1>
    <div class="text-start">
        <a href="{{ route('workers.index') }}" class="bg-blue-300 text-white py-2 px-4 rounded-lg">Back to Workers</a>
    </div>
    <div class="grid grid-cols-4 h-full max-h-96 mb-12">
        <div class=""></div>
        <div class="bg-blue-300 col-span-2  rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img src="{{ asset('storage/' . $worker->image_path) }}" alt="{{ $worker->name }}" class="rounded-t-lg w-full h-full max-h-96 object-cover">
            <div class="p-4">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold mb-2">{{ $worker->name }}</h2>
                    <h2 class="text-xl font-bold text-purple-600 mb-2">{{ $worker->position }}</h2>
                </div>
                <p class="text-purple-700">{{ $worker->description }}</p>
            
            </div>
        </div>
        <div class=""></div>
    </div>
</main>

@include('layouts.footer')
