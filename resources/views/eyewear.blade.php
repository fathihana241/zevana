<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Eyewear</title>
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


<!-- Hero Section -->
<section class="flex justify-center items-center min-h-screen">
    <header
        class="flex flex-wrap justify-between items-center w-full px-6 py-10
               bg-gradient-to-br from-gray-100 via-gray-100 to-teal-100 min-h-screen">

        <!-- Left Content -->
        <div class="flex-1 pl-10">
            <h1 class="text-4xl font-bold text-[#f4a261] mb-5 animate-fadeIn">
                Shop Stylish Eyewear Online
            </h1>

            <p class="text-lg text-black max-w-md animate-fadeInSlide">
                Discover our wide collection of trendy glasses and sunglasses.
                Order online and enjoy fast delivery of premium-quality eyewear
                that suits your style and enhances your vision.
            </p>
        </div>

        <!-- Right Images -->
        <div class="flex gap-6 pr-10">
            <div class="w-[200px] perspective">
                <div
                    class="w-full h-[500px] rounded-lg shadow-md overflow-hidden
                           bg-cover bg-center transform transition duration-500
                           hover:-translate-y-2 hover:scale-105 hover:shadow-2xl"
                    style="background-image: url('{{ asset('images/eye1.jpeg') }}');">
                </div>
            </div>

            <div class="w-[200px] perspective">
                <div
                    class="w-full h-[450px] rounded-lg shadow-md overflow-hidden
                           bg-cover bg-center transform transition duration-500
                           hover:-translate-y-2 hover:scale-105 hover:shadow-2xl"
                    style="background-image: url('{{ asset('images/eye2.jpeg') }}');">
                </div>
            </div>

            <div class="w-[200px] perspective">
                <div
                    class="w-full h-[400px] rounded-lg shadow-md overflow-hidden
                           bg-cover bg-center transform transition duration-500
                           hover:-translate-y-2 hover:scale-105 hover:shadow-2xl"
                    style="background-image: url('{{ asset('images/eye3.jpeg') }}');">
                </div>
            </div>
        </div>
    </header>
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

                    <form method="POST" action="{{ route('checkout') }}" class="inline-block">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="category" value="jewelry">
                        <button type="submit" 
                                class="px-4 py-2 bg-black text-white rounded-full text-sm 
                                       hover:bg-gray-800 transition flex items-center gap-1 
                                       hover:scale-105 transform duration-300">
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


</body>
</html>