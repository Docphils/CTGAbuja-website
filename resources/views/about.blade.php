@include('layouts.header')
@php
    $latestGalleries = \App\Models\Gallery::latest()->take(3)->get();
@endphp
        <main class="mt-6 container mx-auto py-12 px-4 text-white">
                <!-- Mission Section -->
                <section id="mission" class="mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
                    <p class="text-lg leading-relaxed">
                        Our mission is to spread the love and teachings of Jesus Christ, foster a strong community of faith, and serve those in need through compassionate outreach and support.
                    </p>
                </section>
            
                <!-- History Section -->
                <section id="history" class="mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our History</h2>
                    <p class="text-lg leading-relaxed">
                        Founded in [Year], our church has been a beacon of hope and spiritual guidance in the community. Over the years, we have grown and evolved, continuing to honor our traditions while embracing new ways to serve our congregation.
                    </p>
                </section>
            
                <!-- Gallery Section -->
                <section id="gallery" class="mb-12">
                    <h2 class="text-3xl font-bold mb-4">Gallery</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($latestGalleries as $gallery)
                        <div class="relative overflow-hidden rounded-lg shadow-md hover:shadow-xl">
                            <img class="w-full h-80" src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery Image 1">
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300 ease-in-out bg-black bg-opacity-50">
                                <p class="text-white text-lg font-semibold">{{$gallery->title}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ route('gallery.index')}}" class="inline-block px-6 py-3 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                            View More
                        </a>
                    </div>
                </section>

            
                <!-- Workers Section -->
                <section id="workers">
                    <h2 class="text-3xl font-bold mb-4">Our Workers</h2>
                    
                    <!-- Clergy Section -->
                    <div id="clergy" class="mb-8">
                        <h3 class="text-2xl font-semibold mb-2">Clergy</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-blue-300 p-4 rounded-lg shadow-md hover:shadow-lg">
                                <img class="w-full h-48 object-cover rounded-t-lg" src="clergy1.jpg" alt="Clergy 1">
                                <div class="p-4">
                                    <h4 class="text-xl font-bold">Revd. Can. Nelson Akinwade</h4>
                                    <p class="text-gray-400">Vicar</p>
                                </div>
                            </div>
                            <div class="bg-blue-300 p-4 rounded-lg shadow-md hover:shadow-lg">
                                <img class="w-full h-48 object-cover rounded-t-lg" src="clergy2.jpg" alt="Clergy 2">
                                <div class="p-4">
                                    <h4 class="text-xl font-bold">Reverend Caleb Udochukwu</h4>
                                    <p class="text-gray-400">Curate</p>
                                </div>
                            </div>
                            <!-- Add more clergy members as needed -->
                        </div>
                    </div>
            
                    <!-- Other Workers Section -->
                    <div id="other-workers">
                        <h3 class="text-2xl font-semibold mb-2">Other Workers</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-blue-300 p-4 rounded-lg shadow-md hover:shadow-lg">
                                <img class="w-full h-48 object-cover rounded-t-lg" src="worker1.jpg" alt="Worker 1">
                                <div class="p-4">
                                    <h4 class="text-xl font-bold">Mr Opeyemi Oladele</h4>
                                    <p class="text-gray-400">Choir Director</p>
                                </div>
                            </div>
                            <div class="bg-blue-300 p-4 rounded-lg shadow-md hover:shadow-lg">
                                <img class="w-full h-48 object-cover rounded-t-lg" src="worker2.jpg" alt="Worker 2">
                                <div class="p-4">
                                    <h4 class="text-xl font-bold">Mrs Amaka Amuta</h4>
                                    <p class="text-gray-400">Pastor's Warden</p>
                                </div>
                            </div>
                            <div class="bg-blue-300 p-4 rounded-lg shadow-md hover:shadow-lg">
                                <img class="w-full h-48 object-cover rounded-t-lg" src="worker2.jpg" alt="Worker 2">
                                <div class="p-4">
                                    <h4 class="text-xl font-bold">Mr Ruben Akitunde</h4>
                                    <p class="text-gray-400">People's Warden</p>
                                </div>
                            </div>
                            <!-- Add more other workers as needed -->
                        </div>
                    </div>
                </section>
        
        </main>
@include("layouts.footer")
                </div>
            </div>
        </div>
    </body>
</html>
