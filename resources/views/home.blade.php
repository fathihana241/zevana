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

<!-- Hero Section -->
<div class="bg-light py-5 text-center">
    <h1 class="fw-bold">Luxury That Defines You</h1>
    <p class="text-muted">Watches • Jewelry • Accessories • Skincare</p>
</div>



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

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    © {{ date('Y') }} Zevana. All Rights Reserved.
</footer>

</body>
</html>
