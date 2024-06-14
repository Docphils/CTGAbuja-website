@include('layouts.homeheader')
@php
    $latestGalleries = \App\Models\Gallery::latest()->take(3)->get();
@endphp
        <main class="mt-6">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <a
                    href="#"
                    id="docs-card"
                    class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-purple-500 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-white/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                >
                    <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                        <img
                            src="images/churchBuilding.jpg"
                            alt="Welcome image"
                            class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                            onerror="
                                document.getElementById('screenshot-container').classList.add('!hidden');
                                document.getElementById('docs-card').classList.add('!row-span-1');
                                document.getElementById('docs-card-content').classList.add('!flex-row');
                                document.getElementById('background').classList.add('!hidden');
                            "
                        />
                        <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center">
                            <div class="text-white text-center">
                                <h1 class="text-purple-500 text-6xl font-fugaz font-bold">Welcome to CTG</h1>
                                <hr class="border-purple-500"><br>
                                <p class="animate-bounce  text-yellow-400 font-cookie text-4xl">Where Jesus Lives!</p>
                            </div>
                        </div>
                        <img
                            src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                            alt="Welcome note icon"
                            class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                        />
                        <div
                            class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-purple to-purple dark:via-zinc-900 dark:to-zinc-900"
                        ></div>
                    </div>

                    <div class="relative flex items-center gap-6 lg:items-end">
                        <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                            

                            <div class="text-center pt-3 sm:pt-5 lg:pt-0">

                                <p class="mt-4 text-xl/relaxed font-cookie text-white">
                                    This is Anglican Church of Transfiguration Gaduwa, Abuja. 
                                    <br> You belong here! Become a member....
                                </p>
                            </div>
                        </div>

                        <svg class="animate-pulse size-8 shrink-0 stroke-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </div>
                </a>

                <a
                    href="{{ route('abouts.index')}}"
                    class="flex items-start mb-0 gap-4 rounded-lg bg-purple-500 p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-white/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                >
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FFFFFF"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/></g></svg>
                    </div>

                    <div class="pt-3 pb-1 sm:pt-5">
                        <h2 class="text-xl font-semibold text-white dark:text-white">About Us</h2>

                        <p class="mt-2 text-lg/relaxed text-white text-justify">
                            CTG is a place where God's children express themselves in the fullness of their God given potentials. We pride ourselves in leading worshippers to experience the splendor of God's glory through worship, prayer, word and power.
                        </p>
                    </div>

                    <svg class="size-6 shrink-0 self-center stroke-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

                
                <div class="flex flex-col items-center gap-4 lg:flex-row lg:justify-between bg-gradient-to-r from-purple-400 to-purple-500 p-6 rounded-lg shadow-md">
                    <!-- Service Time -->
                    <div  class="flex flex-col items-center justify-top flex-shrink-0 w-40 h-40 bg-white rounded-full shadow-lg transform hover:scale-105 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a8 8 0 0 0-8 8c0 3.866 3.65 6.975 8 6.975s8-3.109 8-6.975A8 8 0 0 0 10 2zm0 2a6 6 0 0 0-5.55 3.775c-.035.108-.054.221-.05.334L4.5 9.5v1h11v-2h-1V9.5l-.05-.392c.013-.106.035-.208.05-.308A6 6 0 0 0 10 4zm0 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-blue-800 font-bold text-lg text-center ">Join Us: </span>
                        <p class=" relative text-gray-800 font-bold text-lg text-center justify-top"> Sundays, 9:00AM</p>
                    </div>
                
                    <!-- Donate -->
                    <a href="{{ route('accounts.index') }}" class="flex flex-col items-center pt-2 justify-top flex-shrink-0 w-40 h-40 bg-purple-400 rounded-full shadow-lg transform hover:scale-105 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M15.932 5.778a.375.375 0 0 0-.255-.105H4.323c-.174 0-.327.121-.362.29L3.182 9H1.25a.25.25 0 0 0-.25.25v1.5c0 .138.112.25.25.25h1.932l.485 2.41a.375.375 0 0 0 .362.29H15.68a.374.374 0 0 0 .288-.132.38.38 0 0 0 .055-.328l-1.473-4.732a.367.367 0 0 0-.285-.266zm-1.04 1.444L15.123 9h-9.003l1.029-2.778h8.76zM3.382 10.5l-.46-2.284c-.02-.1.016-.205.1-.266a.375.375 0 0 0-.1-.627H1.5v-1h1.134c.148 0 .278-.097.321-.24l1.187-4.51a.75.75 0 0 1 .722-.556h10.71c.314 0 .598.2.702.497l1.634 5.268a.75.75 0 0 1-.7 1.02h-1.573l-.518 2.578c-.029.147-.149.263-.3.292l-8.16 1.93a.375.375 0 0 0-.277.367v.5h-.25zm11.723-1.44L5.121 11h9.662l-.978 2.5H5.989l-.667 2.668h9.897a.376.376 0 0 0 .3-.149l1.473-1.947a.38.38 0 0 0 .078-.213l1.006-6.05a.372.372 0 0 0-.214-.393.374.374 0 0 0-.393.013zM14.372 7.5H5.99L5.48 9h9.385L14.372 7.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-red-100 text-2xl animate-[bounce_6s_ease-in-out_infinite] font-bold text-center p-2">Support Our Mission</span>
                    </a>
                
                    <!-- Join Live Sermon -->
                    <a href="{{ route('sermons.index')}}" class="flex flex-col items-center justify-top flex-shrink-0 w-40 h-40 bg-white rounded-full shadow-lg transform hover:scale-105 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.456 10.22a1.75 1.75 0 0 1 2.346-1.625l5.582 2.05c.4.147.644.552.566.967l-.5 3a1 1 0 0 1-1.171.82l-3.527-.55a1.75 1.75 0 0 1-1.417-1.048l-.799-1.874zM9.5 3a7.5 7.5 0 1 1 0 15 7.5 7.5 0 0 1 0-15zm0 1.5a6 6 0 1 0 0 12 6 6 0 0 0 0-12z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-green-600 font-bold text-xl text-center mt-2">God's Message for you</span>
                    </a>
                </div>
                

                <!--Gallery Section -->
                <div class="flex items-start gap-4 rounded-lg bg-purple-500 pt-6 pl-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-3 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FFFFFF"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg>
                    </div>

                    <div class="pt-1 sm:pt-5">
                        <h2 class="text-xl font-semibold self-center text-white dark:text-white">Gallery</h2>

                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 pr-10 ">
                                <!-- Gallery items -->
                                @foreach($latestGalleries as $gallery)
                                <a href="{{ route('gallery.show', $gallery->id) }}" class="relative h-full w-full max-h-36">
                                    <div class="relative w-full h-full max-h-36 overflow-hidden rounded-lg shadow-md hover:shadow-xl">
                                        <img class="w-full h-auto object-cover" src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery image">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300 ease-in-out bg-black bg-opacity-50">
                                            <p class="text-white text-lg font-semibold">{{ $gallery->title }}</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    <a class="absolute right-0 mr-8 self-center" href="{{ route('gallery.index') }}">
                        <svg class="size-8 shrink-0  stroke-[#ffffff]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </a>
                </div>

            </div>
        </main>

@include("layouts.footer")
       
