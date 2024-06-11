@include("layouts.header")

<main class="container text-black mx-auto py-8 px-4">
    <h1 class="text-4xl font-bold text-white mb-8">Contact Form Submission Details</h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <p class="text-lg mb-4"><strong>Name:</strong> {{ $contact->name }}</p>
        <p class="text-lg mb-4"><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="text-lg mb-4"><strong>Message:</strong></p>
        <p>{{ $contact->message }}</p>
    </div>

    <a href="{{ route('contacts.messages') }}" class="text-white underline mt-6 inline-block">Back to Submissions</a>
</main>

@include("layouts.footer")
