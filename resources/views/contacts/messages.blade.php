@include("layouts.header")

<main class="container text-black mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold mb-8">Contact Form Submissions</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Name</th>
                <th class="py-2">Email</th>
                <th class="py-2">Message</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($contact->message, 50) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-500 underline">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>

@include("layouts.footer")
