@include("layouts.header")
<style>
            /* Custom styles for expandable cards */
            .expandable-card {
                max-height: 200px;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            .expandable-card.expanded {
                max-height: 1000px; /* Arbitrarily large value to ensure expansion */
            }
        </style>
<main class="container mx-auto py-12 px-4 flex flex-col text-white lg:flex-row">
    <!-- Past Programs Section -->
    <section id="past-programs" class="lg:w-3/4 lg:mr-8 mb-12 lg:mb-0">
        <h2 class="text-3xl font-bold mb-6">Past Programs</h2>

        <div class="mb-8 bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out expandable-card">
            <h3 class="text-2xl font-semibold mb-2">Program 1</h3>
            <p class="leading-relaxed">
                A brief description of Program 1. This part is always visible. Click to read more...
            </p>
            <div class="hidden">
                <p class="leading-relaxed mt-4">
                    Detailed information about Program 1. This part is hidden and shown when the card expands.
                </p>
            </div>
            <button class="mt-4 px-4 py-2 text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out expand-btn">
                Read More
            </button>
        </div>

        <div class="mb-8 bg-blue-300 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out expandable-card">
            <h3 class="text-2xl font-semibold mb-2">Program 2</h3>
            <p class="leading-relaxed">
                A brief description of Program 2. This part is always visible. Click to read more...
            </p>
            <div class="hidden">
                <p class="leading-relaxed mt-4">
                    Detailed information about Program 2. This part is hidden and shown when the card expands.
                </p>
            </div>
            <button class="mt-4 px-4 py-2 text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out expand-btn">
                Read More
            </button>
        </div>

        <!-- Add more past programs as needed following the same structure -->
    </section>

    <!-- Upcoming Programs Section -->
    <aside id="upcoming-programs" class="lg:w-1/4 bg-blue-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
        <h2 class="text-3xl font-bold mb-6">Upcoming Programs</h2>

        <div class="mb-6">
            <h3 class="text-2xl font-semibold mb-2">Upcoming Program 1</h3>
            <p class="leading-relaxed mb-4">
                A brief description of the upcoming program.
            </p>
            <a href="/register/upcoming-program-1" class="inline-block px-4 py-2 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                Register Now
            </a>
        </div>

        <div class="mb-6">
            <h3 class="text-2xl font-semibold mb-2">Upcoming Program 2</h3>
            <p class="leading-relaxed mb-4">
                A brief description of the upcoming program.
            </p>
            <a href="/register/upcoming-program-2" class="inline-block px-4 py-2 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-md hover:bg-gray-100 transition duration-300 ease-in-out">
                Register Now
            </a>
        </div>

        <!-- Add more upcoming programs as needed following the same structure -->
    </aside>
</main>

<script>
    // Script to handle the expandable cards
    document.querySelectorAll('.expand-btn').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.expandable-card');
            const hiddenContent = card.querySelector('div.hidden');
            card.classList.toggle('expanded');
            hiddenContent.classList.toggle('hidden');
            button.textContent = card.classList.contains('expanded') ? 'Show Less' : 'Read More';
        });
    });
</script>

@include("layouts.footer")