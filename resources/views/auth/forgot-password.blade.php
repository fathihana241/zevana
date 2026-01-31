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
        <h1 class="text-3xl font-serif font-semibold mb-6 text-center text-[#0d1b2a]">
            Reset Your Password
        </h1>

        <!-- Description -->
        <p class="text-center text-gray-600 mb-10 max-w-md">
            Enter your email and your new password below to reset your Zevana account password.
        </p>

        <!-- Card / Form -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">

            <!-- Success Message -->
            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4 text-red-500" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Hidden Token -->
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="Email Address" class="font-medium text-gray-700" />
                    <x-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email', request()->email)"
                        required
                        autofocus
                        placeholder="Enter your email"
                        class="w-full p-3 mt-1 rounded-lg border border-gray-300 bg-gray-100
                               focus:outline-none focus:ring-2 focus:ring-[#c96833]"
                    />
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <x-label for="password" value="New Password" class="font-medium text-gray-700" />
                    <x-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Enter new password"
                        class="w-full p-3 mt-1 rounded-lg border border-gray-300 bg-gray-100
                               focus:outline-none focus:ring-2 focus:ring-[#c96833]"
                    />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-label for="password_confirmation" value="Confirm Password" class="font-medium text-gray-700" />
                    <x-input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        placeholder="Re-enter new password"
                        class="w-full p-3 mt-1 rounded-lg border border-gray-300 bg-gray-100
                               focus:outline-none focus:ring-2 focus:ring-[#c96833]"
                    />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                            class="bg-[#c96833] hover:bg-[#a55328] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Reset Password
                    </button>
                </div>

            </form>
        </div>

        <!-- Back to Login -->
        <p class="mt-6 text-center text-sm">
            Remembered your password? 
            <a href="{{ route('login') }}" class="text-orange-500 font-semibold hover:underline">
                Log in
            </a>
        </p>

    </div>
</x-guest-layout>
