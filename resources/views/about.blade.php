<x-guest-layout>
@include('layouts.header')
    <!-- About Us Section -->
    <section class="flex flex-col md:flex-row items-center justify-between px-10 py-20 gap-12 md:px-24">

        <!-- LEFT COLUMN -->
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Image -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/ab1.jpg') }}"
                     class="w-full h-[420px] object-cover"
                     alt="Zevana">
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/ab3.jpeg') }}"
                     class="w-full h-[420px] object-cover"
                     alt="Luxury">
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="flex-1 max-w-md">
            <h5 class="text-[#f4a261] text-sm font-semibold tracking-widest mb-3">
                ZEVANA
            </h5>

            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 text-[#0d1b2a]">
                ABOUT US
            </h1>

            <p class="text-gray-700 text-lg leading-relaxed mb-8">
                Zevana is more than just luxury shopping — it’s a lifestyle.
                We bring curated collections of watches, eyewear, jewelry,
                fragrances, skincare, and accessories for the modern generation.
            </p>

            <a href="{{ url('/') }}"
               class="inline-block bg-gradient-to-br from-[#f4a261] to-[#e76f51]
                      text-white px-8 py-4 rounded-xl font-semibold shadow-lg
                      hover:-translate-y-1 transition">
                EXPLORE COLLECTIONS
            </a>
        </div>

    </section>

<!-- OUR SERVICE Section -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Title -->
        <h2 class="text-center text-4xl md:text-5xl font-extrabold text-gray-900">
            OUR SERVICE
        </h2>

        <!-- Service Cards -->
        <div class="mt-14 grid gap-12 md:grid-cols-3 md:gap-10">

            <!-- Card 1 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <img src="{{ asset('images/abt3.jpeg') }}"
                     alt="On-Time Order Handling"
                     class="w-56 h-40 object-contain">

                <h3 class="mt-6 text-xl font-semibold">
                    On-Time Order Handling
                </h3>

                <p class="mt-3 text-base leading-relaxed text-gray-600">
                    We prepare every order with accuracy and ensure delivery within the
                    promised timeframe for a smooth shopping experience.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <img src="{{ asset('images/abt2.jpeg') }}"
                     alt="High-Quality Products"
                     class="w-56 h-40 object-contain">

                <h3 class="mt-6 text-xl font-semibold">
                    High-Quality Products
                </h3>

                <p class="mt-3 text-base leading-relaxed text-gray-600">
                    Every item is carefully inspected to meet strict quality standards,
                    ensuring only genuine and premium products are sold.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <img src="{{ asset('images/abt1.jpeg') }}"
                     alt="24/7 Availability"
                     class="w-56 h-40 object-contain">

                <h3 class="mt-6 text-xl font-semibold">
                    24/7 Availability
                </h3>

                <p class="mt-3 text-base leading-relaxed text-gray-600">
                    Customers can shop and manage orders anytime, with our support team
                    available around the clock to assist whenever needed.
                </p>
            </div>

        </div>
    </div>
</section>
<br>
<br>

    <section class="bg-[#1c2a3a] text-white py-16 px-6 md:px-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">

        <!-- Video Section -->
        <div class="w-full md:w-1/2" data-aos="fade-right">
            <video autoplay muted loop playsinline
                   class="rounded-lg shadow-lg w-full max-h-80 object-cover">
                <source src="{{ asset('images/123.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Text Section -->
        <div class="w-full md:w-1/2 text-center md:text-left" data-aos="fade-left">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#e4702d] mb-4 uppercase">
                Product Quality
            </h2>

            <p class="text-gray-300 leading-relaxed text-base sm:text-lg">
                Every piece at
                <span class="text-[#e4702d] font-semibold">Zevana</span>
                is crafted with precision and care using the finest materials.
                Our jewelry is designed to not only shine with elegance but also
                stand the test of time. With strict quality checks and attention
                to detail, we ensure that every product reflects durability,
                authenticity, and unmatched craftsmanship.
            </p>
        </div>

    </div>
</section>
<br>
<br>


@include('layouts.footer')
</x-guest-layout>
