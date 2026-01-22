<x-app-layout>
    <div class="max-w-6xl mx-auto p-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-8 text-center text-[#c96833]">Checkout</h1>

        <div class="grid md:grid-cols-2 gap-12 bg-white p-8 rounded-xl shadow-lg">

            <!-- Billing Address -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Billing Information</h2>

                <form method="POST" action="{{ route('checkout.process') }}" class="space-y-4">
                    @csrf
                    <input type="text" name="fullname" placeholder="Fullname" class="w-full border rounded-lg px-4 py-2" required/>
                    <input type="email" name="email" placeholder="Email" class="w-full border rounded-lg px-4 py-2" required/>
                    <input type="tel" name="phone" placeholder="Phone Number" class="w-full border rounded-lg px-4 py-2" required/>
                    <input type="text" name="address" placeholder="Shipping Address" class="w-full border rounded-lg px-4 py-2" required/>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800">
                        Place My Order
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Order Details</h2>
                <div class="bg-gray-50 p-6 rounded-xl shadow space-y-4">
                    <div class="flex justify-between">
                        <span>Product</span>
                        <span>{{ $product->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Price</span>
                        <span>Rs {{ number_format($product->price, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span>Rs 50</span>
                    </div>
                    <hr>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span>Rs {{ number_format($product->price + 50, 2) }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
