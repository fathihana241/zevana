<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>skincare</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (REQUIRED for icons) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4R7x3iZK4A3bKkKXg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
          <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
</head>
<body>
   @include('layouts.header')
   

@section('content')

<!-- Skincare Heading -->
<h1 class="skincare-heading text-center mt-10 mb-6">
    Skincare
</h1>



@push('styles')
<style>
.skincare-heading {
    font-size: 6rem !important;
    font-weight: bold !important;
    letter-spacing: 6px !important;
    margin: 80px 0 50px 0 !important;
    font-family: "Limelight"!important;
    color: #0d1b2a !important;
    text-transform: uppercase !important;
}
</style>
{{-- Skincare Gallery Buttons --}}
<div class="flex justify-center items-center gap-6 py-8 bg-white">
    @foreach ($productsByCategory as $key => $products)
        @php
            // Format label for button (capitalize first letter, replace 'lipcare' with 'Lip Care')
            $label = $key === 'lipcare' ? 'Lip Care' : ucfirst($key);
        @endphp
        <div class="flex flex-col items-center cursor-pointer" onclick="showGallery('{{ $key }}')">
            <img src="{{ asset('images/skincare/' . $key . '.jpeg') }}"
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
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fadeIn">

                    {{-- Image Section --}}
                    <div class="relative group">
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                        
                        {{-- Badge --}}
                        <span class="absolute top-3 left-3 bg-black text-white text-xs px-3 py-1 rounded-full animate-slideIn">
                            Best Seller
                        </span>

                        {{-- Logo --}}
                        <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow animate-bounce-slow">
                            <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}" class="w-6 h-6" alt="logo">
                        </div>
                    </div>

                    {{-- Details --}}
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">Step back into classic style with premium quality.</p>

                        {{-- Price + Buttons --}}
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-lg font-semibold">Rs. {{ number_format($product->price, 2) }}</span>

                            <div class="flex items-center space-x-2">
                                {{-- Buy Now --}}
                                <button type="button" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition">
                                    Buy {{ ucfirst($key) }} →
                                </button>

                                {{-- Wishlist --}}
                                <button type="button" class="p-2 rounded-full hover:bg-gray-100 transition">
                                    <i class="fa-regular fa-star text-gray-500 hover:text-yellow-400"></i>
                                </button>
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

// Show first gallery by default
document.addEventListener('DOMContentLoaded', function () {
    const firstGallery = Object.keys(@json(array_keys($productsByCategory)))[0];
    if (firstGallery) showGallery(firstGallery);
});
</script>

{{-- Animations --}}
<style>
@keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
@keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
@keyframes bounceSlow { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-4px); } }
.animate-fadeIn { animation: fadeIn 0.8s ease-in-out; }
.animate-slideIn { animation: slideIn 0.7s ease-in-out; }
.animate-bounce-slow { animation: bounceSlow 2s infinite; }
</style>


</body>
</html>
