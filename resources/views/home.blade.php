@extends('layouts.app')

@section('hero section')
    <!-- Hero Section -->
    <div class="py-12 bg-white h-screen relative overflow-hidden">
        <!-- Container untuk kotak-kotak random (tetap dipertahankan) -->
        <div id="random-boxes" class="absolute inset-0 w-full h-full pointer-events-none"></div>

        <!-- Left Side Photo Icons - Hidden on mobile and medium screens -->
        <div
            class="photo-icons-left absolute left-0 inset-y-0 w-16 md:hidden lg:block lg:w-48 xl:w-64 overflow-hidden pointer-events-none z-10 hidden ">
            <!-- Ikon Kamera -->
            <div class="absolute z-50 top-20 left-8 transform rotate-12 text-2xl lg:text-3xl xl:text-4xl">📷</div>
            <div class="absolute z-50 top-48 left-24 transform -rotate-6 text-2xl lg:text-3xl xl:text-4xl">🖼️</div>
            <div class="absolute z-50 top-28 left-48 transform -rotate-6 text-2xl lg:text-3xl xl:text-4xl">🎉</div>
            <div class="absolute z-50 bottom-72 left-12 transform rotate-2 text-2xl lg:text-3xl xl:text-4xl">👑</div>
            <div class="absolute z-50 bottom-32 left-38 transform rotate-10 text-2xl lg:text-3xl xl:text-4xl">🥸</div>
            <div class="absolute z-50 bottom-80 left-54 transform rotate-10 text-2xl lg:text-3xl xl:text-4xl">🎭</div>

            <!-- Additional icons for lg screens and up -->

            <div
                class="absolute z-50 bottom-48 left-8 transform -rotate-4 text-2xl lg:text-3xl xl:text-4xl hidden lg:block">
                🎬</div>
            <div
                class="absolute z-50 bottom-96 left-36 transform rotate-15 text-2xl lg:text-3xl xl:text-4xl hidden lg:block">
                🎪</div>
            <div class="absolute z-50 top-10 left-36 transform -rotate-10 text-2xl lg:text-3xl xl:text-4xl hidden lg:block">
                ✨</div>

            <!-- Frame Polaroid (statis) - scaled down on lg -->
            <div
                class="absolute top-36 left-6 w-20 h-24 lg:w-16 lg:h-20 xl:w-24 xl:h-28 bg-white rounded shadow-md transform -rotate-6">
                <div class="w-full h-4/5 bg-blue-200"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Photobooth</span>
                </div>
            </div>



            <div
                class="absolute bottom-20 left-10 w-20 h-24 lg:w-16 lg:h-20 xl:w-28 xl:h-32 bg-white rounded shadow-md transform -rotate-4">
                <div class="w-full h-4/5 bg-violet-300"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Cool</span>
                </div>
            </div>

            <!-- Additional frames for lg screens and up -->
            <div
                class="absolute top-80 left-24 w-16 h-20 xl:w-24 xl:h-28 bg-white rounded shadow-md transform rotate-8 hidden lg:block">
                <div class="w-full h-4/5 bg-pink-200"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Memories</span>
                </div>
            </div>
        </div>

        <!-- Right Side Photo Props - Hidden on mobile and medium screens -->
        <div
            class="photo-props-right absolute right-0 inset-y-0 w-16 md:hidden lg:block lg:w-48 xl:w-64 overflow-hidden pointer-events-none z-10 hidden ">
            <!-- Props statis -->
            <div class="absolute z-50 top-24 left-0 text-4xl lg:text-3xl xl:text-5xl transform -rotate-12">✨</div>
            <div class="absolute z-50 top-52 right-8 text-4xl lg:text-3xl xl:text-5xl transform rotate-6">👓</div>
            <div class="absolute z-50 bottom-40 right-40 text-4xl lg:text-3xl xl:text-5xl transform -rotate-15">🎩</div>
            <div class="absolute z-50 bottom-28 right-10 text-4xl lg:text-3xl xl:text-5xl transform -rotate-15">🐱</div>
            <div class="absolute z-50 bottom-72 left-5 text-4xl lg:text-3xl xl:text-5xl transform rotate-20">🥸</div>
            <div class="absolute z-50 top-32 right-28 text-4xl lg:text-3xl xl:text-5xl transform -rotate-8">👑</div>
            <div class="absolute z-50 top-80 right-20 text-4xl lg:text-3xl xl:text-5xl transform rotate-12">🎪</div>

            <!-- Additional props for lg screens and up -->
            <div class="absolute z-50 bottom-64 right-10 text-3xl xl:text-4xl transform -rotate-6 hidden lg:block">🤖</div>

            <!-- Frame Polaroid statis -->
            <div
                class="absolute top-40 right-12 w-20 h-24 lg:w-16 lg:h-20 xl:w-24 xl:h-28 bg-white rounded shadow-md transform rotate-8">
                <div class="w-full h-4/5 bg-green-200"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Fun shots</span>
                </div>
            </div>

            <div
                class="absolute bottom-40 right-12 w-20 h-24 lg:w-16 lg:h-20 xl:w-24 xl:h-28 bg-white rounded shadow-md transform -rotate-10">
                <div class="w-full h-4/5 bg-yellow-200"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Chants!!</span>
                </div>
            </div>

            <!-- Additional frames for lg and xl screens -->
            <div
                class="absolute top-72 right-24 w-16 h-20 xl:w-24 xl:h-28 bg-white rounded shadow-md transform -rotate-6 hidden lg:block">
                <div class="w-full h-4/5 bg-teal-200"></div>
                <div class="w-full h-1/5 bg-white flex items-center justify-center">
                    <span class="text-xs text-gray-500">Smile</span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl h-full mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-center relative z-20">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Photobooth App
                </h1>
                <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">
                    Abadikan momen spesial Anda dengan frame keren dan berbagi dengan teman-teman!
                </p>
                <div class="mt-8">
                    <a href="{{ route('booth') }}"
                        class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kode yang sudah ada untuk random boxes (dipertahankan)
            const container = document.getElementById('random-boxes');
            const colors = ['#f5f5f5', '#e0e0e0', '#d0d0d0', '#f8f8f8', '#ebebeb'];

            function getRandomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            function createRandomBox() {
                const box = document.createElement('div');
                const size = getRandomNumber(20, 120);
                const posX = getRandomNumber(0, container.offsetWidth - size);
                const posY = getRandomNumber(0, container.offsetHeight - size);
                const color = colors[getRandomNumber(0, colors.length - 1)];

                box.style.position = 'absolute';
                box.style.width = `${size}px`;
                box.style.height = `${size}px`;
                box.style.left = `${posX}px`;
                box.style.top = `${posY}px`;
                box.style.backgroundColor = color;
                box.style.opacity = '0.08';
                box.style.borderRadius = '0';
                box.style.animation = 'fadeInOut 2.5s ease forwards';

                container.appendChild(box);

                setTimeout(() => {
                    if (box && box.parentNode) {
                        box.parentNode.removeChild(box);
                    }
                }, 2500);
            }

            setInterval(createRandomBox, 150);

            function createInitialBoxes() {
                for (let i = 0; i < 16; i++) {
                    setTimeout(() => {
                        createRandomBox();
                    }, i * 100);
                }
            }

            createInitialBoxes();
        });
    </script>

    <style>
        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            20% {
                opacity: 0.2;
            }

            80% {
                opacity: 0.2;
            }

            100% {
                opacity: 0;
            }
        }

        /* Responsive styling for icons */
        @media (min-width: 1024px) {

            .photo-icons-left div,
            .photo-props-right div {
                font-size: 1.75rem;
            }
        }

        @media (min-width: 1280px) {

            .photo-icons-left div,
            .photo-props-right div {
                font-size: 2rem;
            }
        }

        /* Styling untuk frame polaroid */
        .photo-frame {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 5px;
            border-radius: 2px;
        }
    </style>
@endsection


@section('content section')
    <!-- Improved Content Section with Gradient Background -->
    <div class="py-12 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Title Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 inline-block relative">
                    Pilih Frame Favoritmu
                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-blue-500 rounded-full">
                    </div>
                </h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Temukan berbagai macam frame menarik untuk menciptakan foto
                    yang tak terlupakan</p>
            </div>

            <!-- Enhanced Category Section -->
            <div class="mb-12 bg-white rounded-xl shadow-md p-6 transform hover:scale-[1.01] transition-all duration-300">
                <div class="flex flex-wrap gap-6 justify-center">
                    <!-- Link to show all frames (no filter) -->
                    <a href="{{ route('home') }}" class="group text-center">
                        <div
                            class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gray-100 flex items-center justify-center
                              shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group-hover:bg-blue-50
                              {{ !isset($selectedCategory) ? 'bg-blue-100 ring-2 ring-blue-500' : '' }}">
                            <span
                                class="text-3xl md:text-4xl transform group-hover:scale-110 transition-transform duration-300">🏠</span>
                        </div>
                        <p class="mt-2 text-sm font-medium text-gray-700 group-hover:text-blue-600">Semua</p>
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('home', ['category' => $category->id]) }}" class="group text-center">
                            <div
                                class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gray-100 flex items-center justify-center
                                  shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group-hover:bg-blue-50
                                  {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'bg-blue-100 ring-2 ring-blue-500' : '' }}">
                                <span
                                    class="text-3xl md:text-4xl transform group-hover:scale-110 transition-transform duration-300">{{ $category->icon }}</span>
                            </div>
                            <p class="mt-2 text-sm font-medium text-gray-700 group-hover:text-blue-600">
                                {{ $category->name }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Frames Section -->
            <div class="mt-12">
                @if ($frames->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($frames as $frame)
                            <div
                                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="relative p-2 h-48 md:h-56 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group">
                                    <!-- Frame image preview with hover effect -->
                                    <img src="{{ asset('storage/' . $frame->image_path) }}" alt="{{ $frame->name }}"
                                        class="max-h-full max-w-full object-contain transition-transform duration-300 group-hover:scale-105">

                                    <!-- Quick preview overlay -->
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <button
                                            class="px-4 py-2 bg-white text-gray-800 rounded-md font-medium hover:bg-blue-50">
                                            Preview
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $frame->name }}</h3>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg mr-2">{{ $frame->category->icon }}</span>
                                        <span class="text-sm text-gray-600">{{ $frame->category->name }}</span>
                                    </div>
                                    <a href="{{ route('booth', ['frame_id' => $frame->id]) }}"
                                        class="mt-3 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 w-full transition-colors duration-300">
                                        Gunakan Frame
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-blue-50 rounded-xl shadow-inner">
                        <div class="inline-block text-6xl mb-4">🖼️</div>
                        <p class="text-xl text-gray-600">Belum ada frame yang tersedia untuk kategori ini.</p>
                        <p class="mt-2 text-gray-500">Silakan pilih kategori lain atau kembali lagi nanti.</p>
                    </div>
                @endif
            </div>

            <!-- Enhanced About App Section -->
            <div class="mt-16 bg-gradient-to-r from-blue-500 to-indigo-600 overflow-hidden shadow-xl rounded-xl text-white">
                <div class="md:flex items-center">
                    <div class="md:w-1/3 flex justify-center p-6">
                        <div class="text-8xl">📸✨</div>
                    </div>
                    <div class="md:w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-6">Tentang Aplikasi Photobooth</h2>
                        <p class="mb-4 opacity-90">
                            Aplikasi ini memungkinkan Anda untuk mengambil foto dengan berbagai pilihan frame menarik.
                            Abadikan momen spesial Anda dengan tampilan yang lebih keren!
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('about') }}"
                                class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-300">
                                <span>Pelajari lebih lanjut</span>
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <style>
        /* Hide scrollbar for popular frames carousel */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Smooth fade effect for grid items */
        .grid>div {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .grid>div:nth-child(1) {
            animation-delay: 0.05s;
        }

        .grid>div:nth-child(2) {
            animation-delay: 0.1s;
        }

        .grid>div:nth-child(3) {
            animation-delay: 0.15s;
        }

        .grid>div:nth-child(4) {
            animation-delay: 0.2s;
        }

        .grid>div:nth-child(5) {
            animation-delay: 0.25s;
        }

        .grid>div:nth-child(6) {
            animation-delay: 0.3s;
        }

        .grid>div:nth-child(7) {
            animation-delay: 0.35s;
        }

        .grid>div:nth-child(8) {
            animation-delay: 0.4s;
        }
    </style>

    <!-- Optional: Add JavaScript for enhanced interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effect to frame cards
            const frameCards = document.querySelectorAll('.grid > div');
            frameCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('pulse');
                });

                card.addEventListener('mouseleave', function() {
                    this.classList.remove('pulse');
                });
            });

            // You could add more JavaScript for interactions here
        });
    </script>
@endsection
