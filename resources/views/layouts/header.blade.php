<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zevana</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@php
    $active = "relative text-sm text-[#f4a261] no-underline visited:text-[#f4a261] hover:text-[#f4a261] active:text-[#f4a261] focus:text-[#f4a261] focus:outline-none focus:ring-0 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.5 after:bg-[#f4a261]";
    $inactive = "text-sm text-white no-underline visited:text-white hover:text-[#f4a261] active:text-white focus:text-white focus:outline-none focus:ring-0";
@endphp

<!-- Header -->
<header class="sticky top-0 z-50">

    <!-- Top Navbar -->
    <div class="flex justify-between items-center bg-[#0d1b2a] px-8 py-2">

        <!-- Search Icon -->
        <div class="text-[#f4a261] text-lg cursor-pointer">
            <i class="fa fa-search"></i>
        </div>

        <!-- Logo -->
        <div class="flex items-center h-16">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
                     alt="Zevana Logo"
                     class="h-48 w-auto object-contain">
            </a>
        </div>

        <!-- Desktop Icons -->
        <div class="hidden md:flex items-center space-x-5 text-lg">

            <a href="{{ url('/wishlist') }}"><i class="fa-regular fa-heart text-[#f4a261] hover:opacity-80"></i></a>

            <!-- User Icon -->
             <a href="{{ url('/register') }}">
    <i class="fa-regular fa-user text-[#f4a261] hover:opacity-80"></i>
</a>

 

            <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart text-[#f4a261] hover:opacity-80"></i></a>

            <!-- Logout -->
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-white hover:text-[#f4a261]">Logout</button>
                </form>
            @endauth

        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden text-2xl cursor-pointer" id="menu-btn">
            <i class="fa fa-bars text-[#f4a261]"></i>
        </div>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden md:flex justify-center bg-[#0d1b2a] py-2 space-x-6">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? $active : $inactive }}">HOME</a>
        <a href="{{ url('/watches') }}" class="{{ request()->is('watches*') ? $active : $inactive }}">WATCH</a>
        <a href="{{ url('/eyewear') }}" class="{{ request()->is('eyewear*') ? $active : $inactive }}">EYEWEAR</a>
        <a href="{{ url('/jewelry') }}" class="{{ request()->is('jewelry*') ? $active : $inactive }}">JEWELRY</a>
        <a href="{{ url('/accessories') }}" class="{{ request()->is('accessories*') ? $active : $inactive }}">ACCESSORIES</a>
        <a href="{{ url('/fragrance') }}" class="{{ request()->is('fragrance*') ? $active : $inactive }}">FRAGRANCE</a>
        <a href="{{ url('/skincare') }}" class="{{ request()->is('skincare*') ? $active : $inactive }}">SKINCARE</a>
        <a href="{{ url('/about') }}" class="{{ request()->is('about') ? $active : $inactive }}">ABOUT US</a>
        <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? $active : $inactive }}">CONTACT</a>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-64 bg-[#0d1b2a] p-6 hidden flex-col z-50">

        <!-- Close -->
        <div class="flex justify-end mb-6">
            <button id="close-btn" class="text-white text-2xl">&times;</button>
        </div>

        <!-- Mobile Links -->
        <nav class="flex flex-col space-y-5">
            <a href="{{ url('/') }}" class="text-[#f4a261] hover:text-[#f4a261] visited:text-[#f4a261] focus:text-[#f4a261] active:text-[#f4a261] no-underline">HOME</a>
            <a href="{{ url('/watches') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">WATCH</a>
            <a href="{{ url('/eyewear') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">EYEWEAR</a>
            <a href="{{ url('/jewelry') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">JEWELRY</a>
            <a href="{{ url('/accessories') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">ACCESSORIES</a>
            <a href="{{ url('/fragrance') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">FRAGRANCE</a>
            <a href="{{ url('/skincare') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">SKINCARE</a>
            <a href="{{ url('/about') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">ABOUT US</a>
            <a href="{{ url('/contact') }}" class="text-[#f4a261] hover:text-[#f4a261] no-underline">CONTACT</a>
        </nav>

        <!-- Mobile Icons -->
        <div class="flex space-x-6 pt-8 text-xl">
            <a href="{{ url('/wishlist') }}"><i class="fa-regular fa-heart text-[#f4a261] hover:opacity-80"></i></a>

            <!-- Mobile User Icon -->
             <!-- User Icon -->
             <a href="{{ url('/register') }}">
    <i class="fa-regular fa-user text-[#f4a261] hover:opacity-80"></i>
</a>


     <a href="{{ route('cart') }}">
    <i class="fa fa-shopping-cart text-[#f4a261] hover:opacity-80"></i>
</a>

        <!-- Mobile Logout -->
        @auth
            <form method="POST" action="{{ route('logout') }}" class="pt-4">
                @csrf
                <button type="submit" class="text-white hover:text-[#f4a261]">Logout</button>
            </form>
        @endauth

    </div>

</header>

<!-- Mobile Menu Script -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeBtn = document.getElementById('close-btn');

    menuBtn.addEventListener('click', () => mobileMenu.classList.remove('hidden'));
    closeBtn.addEventListener('click', () => mobileMenu.classList.add('hidden'));
</script>

</body>
</html>
