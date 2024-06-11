@include("layouts.header")

<main class="container text-white mx-auto py-8 px-4">

    <!-- Contact Form Section -->
    <section id="contact-form" class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
        <form action="{{ route('contacts.store') }}" method="POST" class="bg-blue-300 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full text-black p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full text-black p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-lg font-medium mb-2">Message</label>
                <textarea id="message" name="message" rows="6" class="w-full text-black p-3 bg-white rounded-lg border border-gray-600 focus:outline-none focus:border-blue-500" required></textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-purple-700 text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                Send Message
            </button>
        </form>
    </section>

    <!-- Additional Information Section -->
    <section id="additional-info" class="mt-12">
        <h2 class="text-3xl font-bold mb-6">Contact Details</h2>
        <div class="bg-white text-gray-800 rounded-lg shadow-md p-8">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tbody>
                    @if ($contactInfo)
                        <tr>
                            <td class="border px-4 py-2"><strong>Phone:</strong></td>
                            <td class="border px-4 py-2">{{ $contactInfo->phone }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2"><strong>Email:</strong></td>
                            <td class="border px-4 py-2">{{ $contactInfo->email }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2"><strong>Facebook:</strong></td>
                            <td class="border px-4 py-2"><a href="{{ $contactInfo->facebook }}" class="text-blue-500 hover:underline">@ctgabuja</a></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2"><strong>Instagram:</strong></td>
                            <td class="border px-4 py-2"><a href="{{ $contactInfo->instagram }}" class="text-blue-500 hover:underline">@ctgabuja</a></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2"><strong>Youtube:</strong></td>
                            <td class="border px-4 py-2"><a href="{{ $contactInfo->youtube }}" class="text-blue-500 hover:underline">@ctgabuja</a></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2"><strong>Counseling Hours:</strong></td>
                            <td class="border px-4 py-2">{{ $contactInfo->counseling_hours }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2" class="border px-4 py-2">No contact information available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
            @if (auth()->check())
                
            <!-- Button to update or create ContactInfo -->
            @if ($contactInfo)
                <a href="{{ route('contact-info.edit', $contactInfo) }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Contact Info</a>
            @else
                <a href="{{ route('contact-info.edit') }}" class="inline-block mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Create Contact Info</a>
            @endif

            @endif
        </div>
    </section>


    <!-- Google Maps Section -->
    <section id="google-maps">
        <h2 class="text-3xl font-bold my-8 ">Our Location</h2>
        <div class="relative pb-16/9 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.7185134398687!2d7.460298975018493!3d8.998028191062067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0d89901a58a3%3A0xbc92f55af1163b0f!2sChurch%20of%20the%20Transfiguration%2C%20Gaduwa%20(Anglican%20Communion)!5e0!3m2!1sen!2sng!4v1716194284577!5m2!1sen!2sng" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="yes" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    
</main>
@include("layouts.footer")
