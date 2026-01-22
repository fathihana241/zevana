<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Edit Product Form --}}
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Product Name" class="border rounded px-3 py-2 w-full">
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" placeholder="Price" class="border rounded px-3 py-2 w-full">
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stock" class="border rounded px-3 py-2 w-full">

                    <select name="category_id" class="border rounded px-3 py-2 w-full">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <div>
                        <label>Current Image:</label>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="Product Image" class="w-32 h-32 object-cover mt-2">
                        @else
                            <p>No image uploaded.</p>
                        @endif
                    </div>

                    <input type="file" name="image" class="border rounded px-3 py-2 w-full">

                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                        Update Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
