<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Product
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf

                    <div>
                        <x-label for="name" :value="'Product Name'" />
                        <x-input id="name" type="text" name="name" placeholder="Product Name" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-label for="price" :value="'Price'" />
                        <x-input id="price" type="number" step="0.01" name="price" placeholder="Price" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-label for="stock" :value="'Stock'" />
                        <x-input id="stock" type="number" name="stock" placeholder="Stock" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-label for="category_id" :value="'Category'" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full border rounded px-3 py-2">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-label for="image" :value="'Product Image'" />
                        <input type="file" name="image" id="image" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
