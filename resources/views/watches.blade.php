<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zevana</title>

    <!-- Bootstrap (keep only one) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (REQUIRED for icons) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4R7x3iZK4A3bKkKXg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('layouts.header')
<!-- Watches Banner Section -->
<section class="w-full flex justify-center items-center py-16 px-6 bg-[#f4f1ea]">
    <div class="grid grid-cols-3 max-w-6xl w-full items-center gap-6">

        <div class="overflow-hidden rounded-t-[150px] rounded-b-lg">
            <img 
                src="{{ asset('images/wa1.jpeg') }}" 
                alt="Jewelry Collection" 
                class="w-full h-full object-cover"
            >
        </div>

        <div class="flex flex-col items-center text-center px-6">
            <p class="uppercase tracking-wide text-sm text-gray-600">
                Now In Store
            </p>

            <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mt-2 leading-snug">
                Luxury <br> Watch <br> Collection
            </h2>

            <a href="{{ route('watches.shop') }}"
               class="mt-6 bg-[#b49b79] text-white px-6 py-2 text-sm uppercase tracking-wide rounded shadow-md hover:bg-[#a38968] transition">
                Shop Watches
            </a>
        </div>

        <div class="overflow-hidden rounded-lg">
            <img 
                src="{{ asset('images/wa2.jpeg') }}" 
                alt="Model wearing jewelry" 
                class="w-full h-full object-cover"
            >
        </div>

    </div>
</section>
<!-- Products Section -->
<section class="max-w-6xl mx-auto px-6 py-16">

  <h2 class="text-3xl font-bold mb-10 tracking-wide text-center">
    OUR PRODUCTS
  </h2>

  <!-- Product Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

    @if($products->count() > 0)
      @foreach($products as $product)
        <!-- Product Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden
                    transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fadeIn">

          <!-- Image Section -->
          <div class="relative group">
            <img src="{{ $product->image }}"
                 alt="{{ $product->name }}"
                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">

            <!-- Badge -->
            <span class="absolute top-3 left-3 bg-black text-white text-xs px-3 py-1 rounded-full animate-slideIn">
              Best Seller
            </span>

            <!-- Logo -->
            <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow animate-bounce-slow">
              <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
                   alt="logo"
                   class="w-6 h-6">
            </div>
          </div>

          <!-- Content -->
          <div class="p-6">
            <h3 class="text-lg font-bold text-black">
              {{ $product->name }}
            </h3>

            <p class="text-gray-500 text-sm mt-2">
              Own the style with a premium finish.
            </p>

            <p class="text-gray-600 text-sm mt-1">
              Step back into timeless fashion with durable quality.
            </p>
 <div class="flex items-center justify-between mt-4">
                    <span class="text-lg font-semibold">Rs. {{ number_format($product->price, 2) }}</span>
<form method="GET" action="{{ route('checkout') }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit"
            class="px-4 py-2 bg-black text-white rounded-full text-sm hover:bg-gray-800 transition flex items-center gap-1 hover:scale-105 transform duration-300">
        Buy Now <i class="fa fa-arrow-right"></i>
    </button>
</form>

                </div>


            <!-- Wishlist (no route yet) -->
            <button type="button"
                    class="mt-4 text-gray-400 hover:text-yellow-500 transition">
              <i class="fa-regular fa-star text-lg"></i>
            </button>
          </div>

        </div>
      @endforeach
    @else
      <p class="col-span-3 text-center text-gray-500">No products available.</p>
    @endif

  </div>

</section>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@include('layouts.footer')
</body>
</html>
