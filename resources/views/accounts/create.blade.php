
@include('layouts.header')

<div class="container mx-auto py-6 px-4 w-1/2 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4 text-white mt-6">Add Account</h1>
    <form action="{{ route('accounts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Account Title</label>
            <input type="text" name="title" class="form-input w-full border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" required>
        </div>
        <div class="mb-4">
            <label for="account_name" class="block text-gray-700 font-bold mb-2">Account Name</label>
            <input type="text" name="account_name" class="form-input w-full border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="account_name" required>
        </div>
        <div class="mb-4">
            <label for="account_number" class="block text-gray-700 font-bold mb-2">Account Number</label>
            <input type="text" name="account_number" class="form-input w-full border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="account_number" required>
        </div>
        <div class="mb-4">
            <label for="bank_name" class="block text-gray-700 font-bold mb-2">Bank Name</label>
            <input type="text" name="bank_name" class="form-input w-full border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="bank_name" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
    </form>
</div>
@include('layouts.footer')
