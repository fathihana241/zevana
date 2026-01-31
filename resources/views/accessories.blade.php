<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Accessories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4R7x3iZK4A3bKkKXg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
</head>
<body>
    @include('layouts.header')

    {{-- Banner Section --}}
    <div class="bg-white py-10">
        <div class="max-w-[620px] mx-auto">
            <div class="flex items-center justify-center gap-[28px] flex-wrap">

                <div class="w-[183px] h-[400px] flex-shrink-0">
                    <img src="{{ asset('images/bag1.jpeg') }}" alt="Pink Premium"
                         class="w-full h-full object-cover rounded-tl-[90px]">
                </div>

                <div class="w-[116px] h-[400px] flex-shrink-0">
                    <img src="{{ asset('images/bag2.jpeg') }}" alt="Nature Collection"
                         class="w-full h-full object-cover">
                </div>

                <div class="w-[183px] h-[400px] flex-shrink-0">
                    <img src="{{ asset('images/bag3.jpeg') }}" alt="Visit Store"
                         class="w-full h-full object-cover rounded-tr-[90px]">
                </div>

            </div>
        </div>
    </div>

    {{-- Gallery Buttons --}}
    <div class="flex justify-center items-center gap-6 py-8 bg-white flex-wrap">
        @foreach (['bag' => 'Bags', 'belt' => 'Belts', 'pen' => 'Pens'] as $key => $label)
            <div class="flex flex-col items-center cursor-pointer" onclick="showGallery('{{ $key }}')">
                <img src="{{ asset('images/acc-' . $key . '.jpeg') }}"
                     alt="{{ $label }}"
                     class="w-20 h-20 rounded-full bg-[#f5e6e0] p-3">
                <span class="mt-2 text-sm text-gray-800">{{ $label }}</span>
            </div>
        @endforeach
    </div>

    {{-- Galleries --}}
    @foreach ($productsByCategory as $key => $products)
        <div id="{{ $key }}" class="gallery hidden">
            <div class="py-12">
                <h2 class="text-2xl font-semibold text-center mb-10">{{ ucfirst($key) }} Collection</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                            {{-- Image --}}
                            <div class="relative">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                     class="w-full h-64 object-cover">
                                <span class="absolute top-3 left-3 bg-white text-xs font-semibold px-2 py-1 rounded-md shadow">
                                    Best Seller
                                </span>
                                <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow animate-bounce-slow">
                                    <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}" class="w-6 h-6">
                                </div>
                            </div>

                            {{-- Details --}}
                            <div class="p-5 flex flex-col flex-grow">
                                <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    Step back into classic style with premium quality.
                                </p>

                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-lg font-semibold">
                                        Rs. {{ number_format($product->price, 2) }}
                                    </span>

                                    <div class="flex items-center space-x-2">
                                        {{-- Buy --}}
                                        <form method="GET" action="{{ route('checkout') }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit"
            class="px-4 py-2 bg-black text-white rounded-full text-sm hover:bg-gray-800 transition flex items-center gap-1 hover:scale-105 transform duration-300">
        Buy Now <i class="fa fa-arrow-right"></i>
    </button>
</form>

                                        {{-- Wishlist --}}
                                        <form action="{{ route('wishlist.store') }}" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="category" value="products">
    <input type="hidden" name="subcategory" value="">

    <button type="submit"
            class="mt-4 text-gray-400 hover:text-yellow-500 transition">
        <i class="fa-regular fa-star text-lg"></i>
    </button>
</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    {{-- JS Gallery Switch --}}
    <script>
        function showGallery(id) {
            document.querySelectorAll('.gallery').forEach(g => g.classList.add('hidden'));
            document.getElementById(id).classList.remove('hidden');
        }

        // Optional: Show first gallery by default
        document.addEventListener('DOMContentLoaded', function () {
            const firstGallery = Object.keys({!! json_encode(array_keys($productsByCategory)) !!})[0];
            if (firstGallery) showGallery(firstGallery);
        });
    </script>
    @include('layouts.footer')
</body>
</html>
