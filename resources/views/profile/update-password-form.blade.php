<x-form-section submit="updatePassword">

    {{-- Title --}}
    <x-slot name="title">
        <h2 class="text-3xl font-serif font-semibold text-center text-[#0d1b2a]">
            Update Password
        </h2>
    </x-slot>

    {{-- Description --}}
    <x-slot name="description">
        <p class="text-center text-gray-600 mt-2">
            Keep your Zevana account secure by updating your password regularly.
        </p>
    </x-slot>

    {{-- Form --}}
    <x-slot name="form">
        <div class="col-span-6 bg-white p-6 rounded-lg">

            <!-- Current Password -->
            <label class="block mb-2 font-medium text-gray-700">
                Current Password
            </label>
            <input
                type="password"
                wire:model="state.current_password"
                placeholder="Enter current password"
                class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                       focus:outline-none focus:ring-2 focus:ring-[#c96833]"
            >
            <x-input-error for="current_password" class="mt-1" />

            <!-- New Password -->
            <label class="block mb-2 font-medium text-gray-700 mt-5">
                New Password
            </label>
            <input
                type="password"
                wire:model="state.password"
                placeholder="Enter new password"
                class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                       focus:outline-none focus:ring-2 focus:ring-[#c96833]"
            >
            <x-input-error for="password" class="mt-1" />

            <!-- Confirm Password -->
            <label class="block mb-2 font-medium text-gray-700 mt-5">
                Confirm Password
            </label>
            <input
                type="password"
                wire:model="state.password_confirmation"
                placeholder="Re-enter new password"
                class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                       focus:outline-none focus:ring-2 focus:ring-[#c96833]"
            >
            <x-input-error for="password_confirmation" class="mt-1" />

        </div>
    </x-slot>

    {{-- Actions --}}
    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600 font-medium" on="saved">
            Password updated successfully.
        </x-action-message>

        <button
            type="submit"
            class="mt-6 bg-[#c96833] hover:bg-[#a55328]
                   text-white font-semibold px-10 py-2 rounded-lg transition"
        >
            Save Changes
        </button>
    </x-slot>

</x-form-section>
