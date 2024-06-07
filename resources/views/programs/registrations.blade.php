
@include("layouts.header")

<main class="container mx-auto pt-4 py-12 px-4 text-white">
    <h2 class="text-3xl font-bold mb-6">Registrations for {{ $program->title }}</h2>

    <div class="bg-gray-50 text-gray-800 p-6 rounded-lg shadow-md">
        @if($program->registrations->isEmpty())
            <p>No registrations yet.</p>
        @else
            <table class="w-full text-left">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2 font-bold px-4">Name</th>
                        <th class="py-2 font-bold px-4">Email</th>
                        <th class="py-2 font-bold px-4">Phone</th>
                        <th class="py-2 font-bold px-4">Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($program->registrations as $registration)
                        <tr class="odd:bg-gray-100">
                            <td class="py-2 px-4">{{ $registration->name }}</td>
                            <td class="py-2 px-4">{{ $registration->email }}</td>
                            <td class="py-2 px-4">{{ $registration->phone }}</td>
                            <td class="py-2 px-4">{{ $registration->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>

@include("layouts.footer")
