
@include('layouts.header')


<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4 text-white">Church Accounts</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Account</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-4 p-4 bg-green-100 border-t-4 border-green-500 text-green-700">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($accounts as $account)
            <div class="bg-white rounded-lg shadow-md text-lg p-6">
                <h2 class="text-xl text-gray-900 font-bold underline mb-2">{{ $account->title }}</h2>
                <p class="mb-2"><strong>Account Name:</strong> {{ $account->account_name }}</p>
                <p class="mb-2"><strong>Account Number:</strong> {{ $account->account_number }}</p>
                <p class="mb-2"><strong>Bank Name:</strong> {{ $account->bank_name }}</p>
                @if (auth()->check())
                    <div class="flex space-x-2 mt-4">
                        <a href="{{ route('accounts.edit', $account->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                @endif
                
            </div>
        @endforeach
    </div>
</div>
