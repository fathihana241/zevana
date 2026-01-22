<x-guest-layout>
 <!-- Header -->
    <header class="sticky top-0 z-50">
        <div class="flex justify-center items-center bg-[#0d1b2a] px-8 py-2">
            <div class="flex items-center h-16">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}"
                         alt="Zevana Logo"
                         class="h-48 w-auto object-contain">
                </a>
            </div>
        </div>
    </header>
    <div class="flex flex-col items-center justify-center min-h-screen px-6">

        <!-- Title -->
        <h1 class="text-3xl font-serif font-semibold mb-10 text-center">
            Login Here!
        </h1>

        <!-- Content Layout -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-4xl">

            <!-- Left: Form -->
            <div class="w-full md:w-1/2 bg-white p-6">
                <form wire:submit.prevent="login" class="bg-white p-6 rounded-lg">

                    <!-- Email -->
                    <label class="block mb-2 font-medium">Email</label>
                    <input type="email"
                           wire:model.defer="email"
                           placeholder="Enter your Email here"
                           class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-orange-400">

                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Password -->
                    <label class="block mb-2 font-medium mt-4">Password</label>
                    <input type="password"
                           wire:model.defer="password"
                           placeholder="Enter your Password here"
                           class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                                  focus:outline-none focus:ring-2 focus:ring-orange-400">

                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Button -->
                    <button type="submit"
                            class="mt-6 bg-[#c96833] hover:bg-[#a55328]
                                   text-white font-semibold px-8 py-2 rounded-lg transition">
                        Log in
                    </button>

                    <!-- Register -->
                    <p class="mt-4 text-sm">
                        Don’t have an account?
                        <a href="{{ route('register') }}"
                           class="text-orange-500 font-semibold hover:underline">
                            Sign up
                        </a>
                    </p>

                </form>
            </div>

            <!-- Right: Image -->
             <div class="hidden md:flex w-full md:w-1/2 items-center justify-center bg-gray-50">
            <img src="{{ asset('images/11.jpeg') }}" alt="Signup Illustration" class="max-w-md">
        </div>

        </div>
    </div>

</x-guest-layout>
