<!-- resources/views/activities/edit.blade.php -->

@include('layouts.header')

<main class="container mx-auto py-12 px-4 text-gray-900 w-1/2">
    <h2 class="text-3xl font-bold text-white mb-6">Edit Activity</h2>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="bg-blue-300 p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="day" class="block text-lg font-semibold mb-2">Day</label>
            <select name="day" id="day" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" required>
                <option value="" disabled>Select a day</option>
                <option value="Monday" {{ $activity->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ $activity->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ $activity->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ $activity->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ $activity->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ $activity->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                <option value="Sunday" {{ $activity->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="time_range" class="block text-lg font-semibold mb-2">Time Range</label>
            <input type="text" name="time_range" id="time_range" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ $activity->time_range }}" required>
        </div>
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" value="{{ $activity->title }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 shadow-lg" rows="4" required>{{ $activity->description }}</textarea>
        </div>
        <div class="mb-4 text-right">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-lg">Update Activity</button>
        </div>
    </form>
</main>

@include('layouts.footer')
