<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pb-12 pt-2">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <main class="container mx-auto text-white py-12 px-4">
                    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>
                
                    <section class="bg-purple-600 p-6 rounded-lg shadow-md mb-6">
                        <h2 class="text-2xl font-semibold mb-4">Site Details</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <p class="text-lg mb-2"><strong>Total Users:</strong> </p>
                                <p class="text-lg mb-2"><strong>Total Programs:</strong> </p>
                                <p class="text-lg mb-2"><strong>Total Activities:</strong> </p>
                            </div>
                            <div>
                                <p class="text-lg mb-2"><strong>Total Sermons:</strong> </p>
                                <p class="text-lg mb-2"><strong>Latest Registered Users:</strong> </p>
                            </div>
                        </div>
                    </section>
                
                    <section class="bg-blue-600 p-6 rounded-lg shadow-md mb-6">
                        <h2 class="text-2xl font-semibold mb-4">Quick Links</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="{{ route('ministries.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Ministries</a>
                            <a href="{{ route('programs.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Programs</a>
                            <a href="{{ route('abouts.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage About</a>
                            <a href="{{ route('sermons.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Sermons</a>
                            <a href="{{ route('contacts.messages') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">View Contact Messages</a>
                            <a href="{{ route('accounts.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Accounts</a>
                            <a href="{{ route('gallery.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Gallery</a>
                            <a href="{{ route('workers.index') }}" class="text-lg bg-blue-400 p-3 rounded-lg shadow-md block text-center hover:bg-blue-500 transition duration-300 ease-in-out">Manage Workers</a>

                        </div>
                    </section>
                
                    <section class="bg-green-600 p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold mb-4">Other Admin Tasks</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="#" class="text-lg bg-green-400 p-3 rounded-lg shadow-md block text-center hover:bg-green-500 transition duration-300 ease-in-out">Site Settings</a>
                            <a href="#" class="text-lg bg-green-400 p-3 rounded-lg shadow-md block text-center hover:bg-green-500 transition duration-300 ease-in-out">View Reports</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
