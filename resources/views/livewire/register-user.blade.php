<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-center mb-6">
            Create Your Zevana Account
        </h2>

        <form wire:submit.prevent="register" class="space-y-4">

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" wire:model="name"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model="email"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" wire:model="password"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium">Confirm Password</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium">Register As</label>
                <select wire:model="user_type"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Register
            </button>

        </form>

        <p class="text-center text-sm mt-4">
            Already have an account?
            <a href="/login" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
