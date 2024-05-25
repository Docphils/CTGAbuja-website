@include("layouts.header")

<main class="container mx-auto py-12 px-4 text-white">

    <!-- Choir Section -->
    <section id="choir" class="mb-12">
        <h2 class="text-3xl font-bold mb-4 text-center">The Choir</h2>
        <div class="bg-gradient-to-r from-blue-300 to-blue-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-64 object-cover rounded-lg mb-4 transform hover:scale-105 transition duration-300 ease-in-out" src="images/fullchurch.jpg" alt="Choir">
            <p class="text-lg leading-relaxed mb-4">
                Our choir leads the congregation in worship through beautiful music and singing. They practice weekly and perform at all church services and special events.
            </p>
            <div class="text-center">
                <a href="/ministries/choir" class="inline-block px-6 py-3 text-lg font-semibold text-blue-600 bg-white rounded-full shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Children Ministry Section -->
    <section id="children-ministry" class="mb-12">
        <h2 class="text-3xl font-bold mb-4 text-center">Children Ministry</h2>
        <div class="bg-gradient-to-r from-green-300 to-green-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-64 object-cover rounded-lg mb-4 transform hover:scale-105 transition duration-300 ease-in-out" src="images/fullchurch.jpg" alt="Children Ministry">
            <p class="text-lg leading-relaxed mb-4">
                Our Children's Ministry provides a fun and safe environment for kids to learn about God's love through stories, songs, and activities designed just for them.
            </p>
            <div class="text-center">
                <a href="/ministries/children-ministry" class="inline-block px-6 py-3 text-lg font-semibold text-green-600 bg-white rounded-full shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Youths/AYF Section -->
    <section id="youths-ayf" class="mb-12">
        <h2 class="text-3xl font-bold mb-4 text-center">Youths/AYF</h2>
        <div class="bg-gradient-to-r from-purple-300 to-purple-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-64 object-cover rounded-lg mb-4 transform hover:scale-105 transition duration-300 ease-in-out" src="images/fullchurch.jpg" alt="Youths/AYF">
            <p class="text-lg leading-relaxed mb-4">
                The Youth and AYF group provides a dynamic space for young people to grow in faith, build friendships, and serve the community through various outreach programs.
            </p>
            <div class="text-center">
                <a href="/ministries/youths-ayf" class="inline-block px-6 py-3 text-lg font-semibold text-purple-600 bg-white rounded-full shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Guild of Stewards Section -->
    <section id="guild-of-stewards" class="mb-12">
        <h2 class="text-3xl font-bold mb-4 text-center">Guild of Stewards</h2>
        <div class="bg-gradient-to-r from-yellow-300 to-yellow-500 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-64 object-cover rounded-lg mb-4 transform hover:scale-105 transition duration-300 ease-in-out" src="images/fullchurch.jpg" alt="Guild of Stewards">
            <p class="text-lg leading-relaxed mb-4">
                The Guild of Stewards ensures the smooth running of our services and events by providing support and hospitality to all members and visitors.
            </p>
            <div class="text-center">
                <a href="/ministries/guild-of-stewards" class="inline-block px-6 py-3 text-lg font-semibold text-yellow-600 bg-white rounded-full shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Additional Ministries -->
    <!-- Add more ministry sections as needed following the same structure -->

</main>

@include("layouts.footer")
