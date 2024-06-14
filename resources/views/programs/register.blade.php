
@include("layouts.header")

<main class="container mx-auto w-1/2 py-12 px-4 rounded-lg shadow-lg text-white">
    <h2 class="text-3xl text-center font-bold mb-6">Register for {{ $program->title }}</h2>

    <form action="{{ route('programs.register', $program->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="w-full p-2 rounded-lg bg-white text-gray-800 ">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-lg font-semibold mb-2">Phone:</label>
            <input type="tel" id="phone" name="phone" class="w-full p-2 rounded-lg bg-white text-gray-800 ">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-lg font-semibold mb-2">Email:</label>
            <input type="email" id="email" name="email" class="w-full p-2 rounded-lg bg-white text-gray-800 ">
        </div>

        <button type="submit" class="bg-blue-300 font-bold w-full p-2 text-center rounded-lg text-xl hover:bg-purple-400">Register</button>
    </form>
</main>

@include("layouts.footer")
