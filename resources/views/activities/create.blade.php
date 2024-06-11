<!-- resources/views/activities/create.blade.php -->

@include('layouts.header')

<main class="container mx-auto py-12 px-4 w-1/2 text-gray-800">
    <h2 class="text-3xl text-white font-bold mb-6">Create New Activity</h2>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.store') }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="day" class="block text-lg font-semibold mb-2">Day</label>
            <select name="day" id="day" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" required>
                <option value="" disabled selected>Select a day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="time_range" class="block text-lg font-semibold mb-2">Time Range</label>
            <input type="text" name="time_range" id="time_range" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ old('time_range') }}" required>
        </div>
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-4 text-right">
            <button type="submit" class="px-4 py-2 bg-blue-600 w-full text-center text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-lg">Create Activity</button>
        </div>
    </form>
</main>

@include('layouts.footer')
