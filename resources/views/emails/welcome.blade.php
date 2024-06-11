<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
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
                <h1 class="text-3xl font-bold text-white">{{ config('app.name') }}</h1>
            </div>
            <!-- Welcome Message -->
            <p class="text-lg text-gray-700 mb-6">Dear {{ $user->name }},</p>
            <p class="text-gray-700 mb-6">Thank you for signing up with {{ config('app.name') }}. We're thrilled to have you as part of our team!</p>
            <p class="text-gray-700 mb-6">As a registered user, you have been granted admin privileges, which means you can access and manage various features of the website.</p>
            <p class="text-gray-700 mb-6">If you have any questions or need assistance, don't hesitate to reach out to the church leadership or the software development team at <a href="www.mephconsults.com.ng">Meph Consults</a>. We're here to help!</p>
            <!-- Sign-off Message -->
            <p class="text-gray-700 mb-6">Once again, welcome aboard!</p>
            <p class="text-gray-700 mb-6">Sincerely,<br> The {{ config('app.name') }} I.T Team</p>
        </div>
    </div>
</body>
</html>
