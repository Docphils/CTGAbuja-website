<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        /* Inline Tailwind CSS */
        @import url('https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Logo and Application Name -->
            <div class="flex items-center bg-purple-600 justify-center mb-6">
                <x-application-logo class="w-32 h-32 fill-current text-blue-300" />
                <h1 class="text-3xl ml-4 font-bold text-white">{{ config('app.name') }}</h1>
            </div>
            <!-- Acknowledgement Message -->
            <p class="text-lg text-gray-700 mb-6">Dear Admin,</p>
            <p class="text-gray-700 mb-6">You have received a new contact message through the contact form on {{ config('app.name') }}.</p>
            <p class="text-gray-700 mb-6"><strong>Name:</strong> {{ $contact->name }}</p>
            <p class="text-gray-700 mb-6"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="text-gray-700 mb-6"><strong>Message:</strong></p>
            <p class="text-gray-700 mb-6">{{ $contact->message }}</p>
            <!-- Sign-off Message -->
            <p class="text-gray-700 mb-6">Best regards,<br>{{ config('app.name') }}</p>
        </div>
    </div>

    <div class="footer w-full bg-blue-400 mb-0 h-16"></div>
</body>
</html>
