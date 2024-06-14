<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
        <div class="mx-auto w-2/3 py-8">
            <h1 class="text-3xl font-bold mb-6">Edit User</h1>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="w-2/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->email }}" required>
                </div>
                <div class="mb-6">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                    <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>                      
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-purple-500 w-full text-xl hover:bg-purple-700 text-white font-bold py-1  rounded focus:outline-none focus:shadow-outline">Update</button>
                </div>
            </form>
        </div>

 </x-app-layout>
