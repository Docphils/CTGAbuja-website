@include('layouts.header')

<main class="container text-white mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold mb-8">Add New Worker</h1>

    <form action="{{ route('workers.store') }}" method="POST" enctype="multipart/form-data" class="bg-blue-300 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium mb-2">Name</label>
            <input type="name" id="name" name="name" class="w-full text-black p-3 bg-white rounded-lg border border-purple-600 focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="type" class="block text-lg font-medium mb-2">Type</label>
            <select name="type" id="type" class="w-full text-black p-3 bg-white rounded-lg border border-purple-600 focus:outline-none focus:border-blue-500" required>
                <option value="clergy">Clergy</option>
                <option value="other_workers">Other Workers</option>
              </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-lg font-medium mb-2">Image</label>
            <input type="file" id="image" name="image" class="w-full text-black p-3 bg-white rounded-lg border border-purple-600 focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="position" class="block text-lg font-medium mb-2">Position</label>
            <input type="text" id="position" name="position" class="w-full text-black p-3 bg-white rounded-lg border border-purple-600 focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-medium mb-2">Description</label>
            <textarea id="description" name="description" rows="6" class="w-full text-black p-3 bg-white rounded-lg border border-purple-600 focus:outline-none focus:border-blue-500"></textarea>
        </div>
        <button type="submit" class="w-full py-3 bg-purple-700 text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
            Add Worker
        </button>
    </form>
</main>

@include('layouts.footer')