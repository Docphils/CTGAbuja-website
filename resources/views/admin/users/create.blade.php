<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
    <div class="container mx-auto w-1/2 rounded-lg shadow-lg bg-gray-200 mt-3 px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Create New User</h1>
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium">Name:</label>
                <input type="text" name="name" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="email" class="block font-medium">Email:</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="role" class="block font-medium">Role:</label>
                <select name="role" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="bg-purple-500 text-white w-full font-bold text-xl py-2 rounded-md hover:bg-purple-700 transition duration-200">Create</button>
        </form>
    </div>
    
</x-app-layout>