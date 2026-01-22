<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition cursor-pointer">
                    <div class="w-full h-40 flex items-center justify-center mb-4">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="object-contain h-full w-full">
                        @else
                            <div class="text-gray-400">No Image</div>
                        @endif
                    </div>
                    <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                    <p class="text-gray-500 mb-2">{{ $product->category->name ?? 'No Category' }}</p>
                    <p class="font-semibold">Rs. {{ number_format($product->price, 2) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
