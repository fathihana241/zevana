<div class="max-w-md mx-auto mt-24 p-6 bg-white shadow rounded">

    <h2 class="text-2xl font-bold text-center mb-6">
        User Login
    </h2>

    @if (session()->has('error'))
        <p class="text-red-500 text-sm mb-4">
            {{ session('error') }}
        </p>
    @endif

    <form wire:submit.prevent="login">

        <div class="mb-4">
            <label>Email</label>
            <input type="email" wire:model="email"
                   class="w-full border px-3 py-2 rounded">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" wire:model="password"
                   class="w-full border px-3 py-2 rounded">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button class="w-full bg-black text-white py-2 rounded">
            Login as User
        </button>

    </form>
</div>
