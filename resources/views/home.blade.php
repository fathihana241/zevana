<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zevana | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
@include('layouts.header')
<!-- Hero / Banner Section -->
<section class="bg-gradient-to-r from-gray-50 to-white py-20">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-12 px-6">
    
    <!-- Left Text Section -->
    <div class="w-full lg:w-1/2 text-center lg:text-left">
      <h5 class="text-sm font-semibold tracking-widest text-gray-500 mb-3">
        WELCOME TO ZEVANA
      </h5>

      <h1 class="text-4xl lg:text-5xl font-bold text-black mb-6 leading-snug">
        Redefining Elegance <br class="hidden lg:block">
        with Timeless Style
      </h1>

      <p class="text-base text-gray-600 leading-relaxed mb-8 max-w-md mx-auto lg:mx-0">
        At <span class="font-semibold text-black">Zevana</span>, we craft more than accessories — 
        we create a statement of sophistication. Discover our latest collection of 
        watches designed to match your modern lifestyle.
      </p>

      <!-- Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
        <button class="px-6 py-3 bg-black text-white text-sm font-medium rounded-full shadow hover:bg-gray-800 transition">
          Explore Zevana
        </button>
        <a href="#shop" class="px-6 py-3 border border-black text-sm font-medium rounded-full hover:bg-black hover:text-white transition">
          Shop Now
        </a>
      </div>
    </div>

    <!-- Right Image Section -->
    <div class="w-full lg:w-1/2 flex justify-center">
      <div class="relative max-w-sm">
        <img src="{{ asset('images/154.jpeg') }}" alt="Zevana Model" 
             class="w-full object-cover rounded-tr-[60px] rounded-bl-[60px]">

        <!-- Border frame -->
        <div class="absolute top-3 left-3 right-3 bottom-3 border border-white/60 rounded-tr-[60px] rounded-bl-[60px]"></div>
      </div>
    </div>

  </div>
</section>

<!-- Products -->
<div class="container my-5">
    <h3 class="mb-4">Latest Products</h3>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">

                    @if($product->image)
                        <img src="{{ asset($product->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted">Rs. {{ number_format($product->price, 2) }}</p>
                        <span class="badge bg-success">In Stock: {{ $product->stock }}</span>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>

<section class="bg-white text-white py-16 px-6 md:px-12">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
    
    <!-- Video Section -->
    <div class="w-full md:w-1/2" data-aos="fade-right">
      <video autoplay muted loop playsinline
             class="rounded-lg shadow-lg w-full max-h-80 object-cover">
        <source src="{{ asset('images/indexvid.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>

    <!-- Text Section -->
    <div class="w-full md:w-1/2 text-center md:text-left bg-white p-8 rounded-2xl border border-gray-200 shadow-md"
         data-aos="zoom-in">
      <h2 class="text-3xl sm:text-4xl font-bold text-[#b84e1d] mb-4 uppercase">
        Premium Elegance
      </h2>

      <p class="text-gray-900 leading-relaxed text-base sm:text-lg">
        Zevana brings you 
        <span class="text-[#b84e1d] font-semibold">luxury crafted to perfection</span>.  
        Each premium item is designed with unmatched attention to detail, combining exquisite materials with modern artistry.  
        From statement watches to timeless jewelry, every piece reflects 
        <span class="font-medium">refined elegance, durability, and superior quality</span>, making it a treasure for generations.
      </p>
    </div>

  </div>
</section>

@include('layouts.footer')

</body>
</html>
