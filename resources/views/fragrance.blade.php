<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Fragrance</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (REQUIRED for icons) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4R7x3iZK4A3bKkKXg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
</head>
<body>
   @include('layouts.header')
   <section class="relative flex flex-col md:flex-row items-center justify-between min-h-[520px] px-[6vw] bg-[#f3f7f8]">

    <!-- Left Content -->
    <div class="max-w-[680px]">
        <h1 class="text-[#1b2430] font-bold leading-[0.95] tracking-[1px] text-[clamp(36px,8vw,96px)] mb-3 font-['Playfair_Display']">
            THE ART OF SCENT,<br>
            THE ESSENCE<br>
            OF SPRING
        </h1>

        <a href="#new-scents" class="inline-flex items-center gap-3 text-[13px] text-[#1b2430] border-b border-black/10 pb-1 mt-7 group">
            NEW SCENTS HERE
            <span class="transition-transform group-hover:translate-x-1">→</span>
        </a>
    </div>

    <!-- Right Banner Image -->
    <div class="relative w-full md:w-[40%] mt-8 md:mt-0 flex justify-center">
        <img src="{{ asset('images/frag12.jpeg') }}" 
             alt="Perfume bottle with spring flowers" 
             class="w-full max-w-[420px] h-auto object-contain">
    </div>

</section>

{{-- Products Section --}}
<section id="products" class="max-w-6xl mx-auto px-6 py-16">

    <h2 class="text-3xl font-bold mb-10 tracking-wide text-center">
        OUR PRODUCTS
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden
                        transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fadeIn">

                <!-- Image Section -->
                <div class="relative group">
                    <img src="{{ asset($product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">

                    <span class="absolute top-3 left-3 bg-black text-white text-xs px-3 py-1 rounded-full animate-slideIn">
                        Best Seller
                    </span>

                    <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow animate-bounce-slow">
                        <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
                             alt="logo"
                             class="w-6 h-6">
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-black">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mt-2">
                        Own the style with a premium finish.
                    </p>
                    <p class="text-gray-600 text-sm mt-1">
                        Step back into timeless fashion with durable quality.
                    </p>

                    <!-- Price + Buy Button -->
                    <div class="flex items-center justify-between mt-6">
                        <span class="text-lg font-bold text-black">
                            RS. {{ number_format($product->price, 2) }}
                        </span>

                        <form method="GET" action="{{ route('checkout') }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit"
            class="px-4 py-2 bg-black text-white rounded-full text-sm hover:bg-gray-800 transition flex items-center gap-1 hover:scale-105 transform duration-300">
        Buy Now <i class="fa fa-arrow-right"></i>
    </button>
</form>
                    </div>

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
        @empty
            <p class="col-span-3 text-center text-gray-500">No products available.</p>
        @endforelse
    </div>

</section>

{{-- Font Awesome --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

{{-- Animations --}}
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes slideIn {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes bounceSlow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
}
.animate-fadeIn { animation: fadeIn 0.8s ease-in-out; }
.animate-slideIn { animation: slideIn 0.7s ease-in-out; }
.animate-bounce-slow { animation: bounceSlow 2s infinite; }
</style>

@include('layouts.footer')
</body>
</html>
