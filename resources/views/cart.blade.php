<x-app-layout>

    <div class="max-w-6xl mx-auto px-6 py-12">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold mb-10 text-center text-[#c96833]">
            My Orders
        </h1>

        @if($orders->isEmpty())
            <p class="text-center text-gray-500">
                You have no orders yet.
            </p>
        @else

            <div class="space-y-12">

                @foreach($orders as $order)

                    <!-- ORDER CARD -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">

                        <!-- ORDER HEADER -->
                        <div class="flex justify-between items-center mb-6">
                            <span class="font-semibold text-gray-700">
                                Order ID: #{{ $order->id }}
                            </span>

                            <span class="text-sm font-semibold text-gray-600">
                                Status:
                                <span class="text-green-600">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </span>
                        </div>

                        <!-- PRODUCTS GRID -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                            @foreach($order->items as $item)

                                <!-- PRODUCT CARD -->
                                <div class="bg-white rounded-2xl shadow-xl overflow-hidden
                                            transform transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

                                    <!-- IMAGE -->
                                    <div class="relative">

                                        <img src="{{ asset($item->image) }}"
                                             alt="{{ $item->name }}"
                                             class="w-full h-64 object-cover">

                                        <!-- CONFIRMED BADGE -->
                                        <span class="absolute top-3 left-3
                                                     bg-green-500 text-white text-xs
                                                     px-3 py-1 rounded-full font-semibold">
                                            Confirmed
                                        </span>

                                        <!-- LOGO -->
                                        <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow">
                                            <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
                                                 class="w-6 h-6"
                                                 alt="logo">
                                        </div>
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="p-5">

                                        <h3 class="text-lg font-bold text-black">
                                            {{ $item->name }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Category:
                                            {{ $item->product->category->name ?? 'Watches' }}
                                        </p>

                                        <p class="text-[#c96833] text-lg font-semibold mt-2">
                                            Rs {{ number_format($item->price, 2) }}
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Qty: {{ $item->quantity }}
                                        </p>

                                    </div>

                                </div>
                                <!-- END PRODUCT CARD -->

                            @endforeach

                        </div>

                        <!-- ORDER TOTAL -->
                        <div class="flex justify-between mt-8 font-bold text-lg border-t pt-4">
                            <span>Total</span>
                            <span class="text-[#c96833]">
                                Rs {{ number_format($order->total_price, 2) }}
                            </span>
                        </div>

                        <!-- DATE -->
                        <p class="text-sm text-gray-500 mt-2">
                            Ordered on:
                            {{ $order->created_at->format('d M Y • h:i A') }}
                        </p>

                    </div>
                    <!-- END ORDER -->

                @endforeach

            </div>

        @endif

    </div>

</x-app-layout>
