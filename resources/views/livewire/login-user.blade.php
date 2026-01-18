<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">

        <h2 class="text-2xl font-bold text-center mb-6">
            Login to Zevana
        </h2>

        <form wire:submit.prevent="login" class="space-y-4">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model="email"
                       class="w-full mt-1 border rounded-lg px-3 py-2">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" wire:model="password"
                       class="w-full mt-1 border rounded-lg px-3 py-2">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Login
            </button>

        </form>

        <p class="text-center text-sm mt-4">
            Don’t have an account?
            <a href="/register" class="text-blue-600 hover:underline">
                Register
            </a>
        </p>

    </div>
</div>
