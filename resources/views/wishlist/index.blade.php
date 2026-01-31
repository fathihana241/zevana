<x-app-layout>

<section class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold mb-10">My Wishlist</h2>

    @if($wishlists->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach($wishlists as $item)
                <div class="bg-white rounded-xl shadow p-4">

                    <img src="{{ asset($item->product->image) }}"
                         class="h-60 w-full object-cover rounded">

                    <h3 class="mt-4 font-semibold text-lg">
                        {{ $item->product->name }}
                    </h3>

                    <p class="text-gray-600 mt-1">
                        Rs. {{ number_format($item->product->price, 2) }}
                    </p>

                    <!-- Remove -->
                    <form action="{{ route('wishlist.destroy', $item->id) }}"
                          method="POST"
                          class="mt-4">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 hover:underline">
                            Remove
                        </button>
                    </form>

                </div>
            @endforeach

        </div>
    @else
        <p class="text-gray-500 text-center">
            Your wishlist is empty ❤️
        </p>
    @endif
</section>

</x-app-layout>
