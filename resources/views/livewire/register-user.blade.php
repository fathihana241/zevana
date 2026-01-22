<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zevana</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@php
    $active = "relative text-sm text-[#f4a261] no-underline visited:text-[#f4a261] hover:text-[#f4a261] active:text-[#f4a261] focus:text-[#f4a261] focus:outline-none focus:ring-0 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.5 after:bg-[#f4a261]";
    $inactive = "text-sm text-white no-underline visited:text-white hover:text-[#f4a261] active:text-white focus:text-white focus:outline-none focus:ring-0";
@endphp

<div>
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



 <!-- Main Content -->
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center bg-gray-100 px-6 py-10">
        <div class="min-h-screen flex flex-col items-center justify-center px-6 py-10 bg-gray-100">

    <!-- Title -->
    <h1 class="text-3xl font-semibold mb-8 text-center text-[#c96833]">Create your Free Account</h1>

    <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-5xl bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- Left Column: Form -->
        <div class="w-full md:w-1/2 bg-white p-8">
            <form wire:submit.prevent="register" class="bg-gray-50 p-6 rounded-lg shadow-sm space-y-4">

                <!-- Full Name -->
                <div>
                    <label class="block mb-2 font-medium">Full Name</label>
                    <input type="text" wire:model="name" placeholder="Enter your Full Name here"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 font-medium">Email</label>
                    <input type="email" wire:model="email" placeholder="Enter your Email here"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block mb-2 font-medium">Password</label>
                    <input type="password" wire:model="password" placeholder="Enter your Password here"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block mb-2 font-medium">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" placeholder="Confirm your Password"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-[#c96833] hover:bg-[#a55328] text-white font-semibold py-3 rounded-lg transition duration-300">
                    Create Account
                </button>

                <!-- Login Link -->
                <p class="mt-4 text-center text-sm">
                    Already have an account?
                    <a href="/login" class="text-orange-500 font-semibold hover:underline">Log in</a>
                </p>

                <!-- Divider -->
                <div class="flex items-center my-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="px-3 text-gray-500 text-sm">OR</span>
                    <hr class="flex-grow border-gray-300">
                </div>

                <!-- Social Buttons -->
                <div class="space-y-3">
                    <button type="button" class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-lg hover:bg-gray-100 transition">
                        <i class="fab fa-google text-red-500 mr-2"></i> Sign up with Google
                    </button>
                    <button type="button" class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-lg hover:bg-gray-100 transition">
                        <i class="fab fa-facebook text-blue-600 mr-2"></i> Sign up with Facebook
                    </button>
                    <button type="button" class="w-full flex items-center justify-center border border-gray-300 py-2 rounded-lg hover:bg-gray-100 transition">
                        <i class="fab fa-apple text-black mr-2"></i> Sign up with Apple
                    </button>
                </div>

            </form>
        </div>

        <!-- Right Column: Illustration -->
        <div class="hidden md:flex w-full md:w-1/2 items-center justify-center bg-gray-50">
            <img src="{{ asset('images/Mobile login concept illustration _ Premium Vector.jpeg') }}" alt="Signup Illustration" class="max-w-md">
        </div>

    </div>
</div>

    </div>
</div>