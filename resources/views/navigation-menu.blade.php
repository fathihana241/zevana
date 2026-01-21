<nav x-data="{ open: false }" class="sticky top-0 z-50">

    <!-- Top Navbar -->
    <div class="flex justify-between items-center bg-[#0d1b2a] px-8 h-16">

        <!-- Logo -->
<div class="flex items-center justify-center w-full">
    <a href="{{ route('dashboard') }}">
        <img
            src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
            alt="Zevana Logo"
            class="h-28 w-auto object-contain"
        >
    </a>
</div>
        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8 text-white">

           

            <!-- User Dropdown -->
            <div class="relative">
                <button @click="open = !open"
                        class="flex items-center gap-2 hover:text-gray-300 transition">
                    <span>{{ Auth::user()->name }}</span>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div x-show="open"
                     @click.outside="open = false"
                     class="absolute right-0 mt-3 w-48 bg-white text-gray-800 rounded-lg shadow-lg overflow-hidden">

                    <a href="{{ route('profile.show') }}"
                       class="block px-4 py-2 hover:bg-gray-100">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button @click="open = !open"
                    class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-[#0d1b2a] text-white px-6 py-4 space-y-3">

        
        <a href="{{ route('profile.show') }}"
           class="block hover:text-gray-300">
            Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full text-left hover:text-gray-300">
                Log Out
            </button>
        </form>

    </div>
</nav>
