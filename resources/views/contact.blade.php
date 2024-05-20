@include("layouts.header")


<main class="container text-white mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold mb-8">Contact Us</h1>

    <!-- Contact Form Section -->
    <section id="contact-form" class="mb-12">
        <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
        <form action="#" method="POST" class="bg-blue-300 p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
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
            <button type="submit" class="w-full py-3 bg-blue-600 text-lg font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                Send Message
            </button>
        </form>
    </section>

    <!-- Google Maps Section -->
    <section id="google-maps">
        <h2 class="text-3xl font-bold mb-6">Our Location</h2>
        <div class="relative pb-16/9">
            <iframe
                class="absolute top-0 left-0 w-full h-full rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.070060196727!2d7.462816774237593!3d8.998065500000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0d89901a58a3%3A0xbc92f55af1163b0f!2sXFX7%2B649%2C%20Abuja%20900110%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1682679829984!5m2!1sen!2sng"
                frameborder="0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0">
            </iframe>
        </div>
    </section>
</main>
@include("layouts.footer")