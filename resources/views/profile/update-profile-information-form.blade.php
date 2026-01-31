<x-form-section submit="updateProfileInformation">

    {{-- Title --}}
    <x-slot name="title">
        <h2 class="text-3xl font-serif font-semibold text-center text-[#0d1b2a]">
            Profile Information
        </h2>
    </x-slot>

    {{-- Description --}}
    <x-slot name="description">
        <p class="text-center text-gray-600 mt-2">
            Update your personal details and email address for your Zevana account.
        </p>
    </x-slot>

    {{-- Form --}}
    <x-slot name="form">
        <div class="col-span-6 bg-white p-6 rounded-lg">

            {{-- Profile Photo --}}
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="mb-8 text-center">

                    <!-- File Input -->
                    <input type="file" id="photo" class="hidden"
                           wire:model.live="photo"
                           x-ref="photo"
                           x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                           " />

                    <!-- Current Photo -->
                    <div class="flex justify-center mb-4" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}"
                             class="rounded-full h-24 w-24 object-cover border-4 border-gray-200"
                             alt="{{ $this->user->name }}">
                    </div>

                    <!-- Preview -->
                    <div class="flex justify-center mb-4" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full h-24 w-24 bg-cover bg-center border-4 border-gray-200"
                              x-bind:style="'background-image: url(' + photoPreview + ')'">
                        </span>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-center gap-3">
                        <button type="button"
                                x-on:click.prevent="$refs.photo.click()"
                                class="bg-[#0d1b2a] text-white px-5 py-2 rounded-lg text-sm hover:opacity-90 transition">
                            Change Photo
                        </button>

                        @if ($this->user->profile_photo_path)
                            <button type="button"
                                    wire:click="deleteProfilePhoto"
                                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg text-sm hover:bg-gray-300 transition">
                                Remove
                            </button>
                        @endif
                    </div>

                    <x-input-error for="photo" class="mt-2 text-center" />
                </div>
            @endif

            {{-- Name --}}
            <label class="block mb-2 font-medium text-gray-700">
                Full Name
            </label>
            <input type="text"
                   wire:model="state.name"
                   placeholder="Enter your name"
                   class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                          focus:outline-none focus:ring-2 focus:ring-[#c96833]">
            <x-input-error for="name" class="mt-1" />

            {{-- Email --}}
            <label class="block mb-2 font-medium text-gray-700 mt-6">
                Email Address
            </label>
            <input type="email"
                   wire:model="state.email"
                   placeholder="Enter your email"
                   class="w-full p-3 mb-1 rounded-lg border border-gray-300 bg-gray-100
                          focus:outline-none focus:ring-2 focus:ring-[#c96833]">
            <x-input-error for="email" class="mt-1" />

            {{-- Email Verification --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification())
                && ! $this->user->hasVerifiedEmail())

                <p class="text-sm mt-3 text-red-500">
                    Your email address is not verified.
                </p>

                <button type="button"
                        wire:click.prevent="sendEmailVerification"
                        class="mt-2 text-sm font-semibold text-[#c96833] hover:underline">
                    Re-send verification email
                </button>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 text-sm text-green-600 font-medium">
                        Verification link sent successfully.
                    </p>
                @endif
            @endif

        </div>
    </x-slot>

    {{-- Actions --}}
    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600 font-medium" on="saved">
            Profile updated successfully.
        </x-action-message>

        <button
            wire:loading.attr="disabled"
            wire:target="photo"
            class="bg-[#c96833] hover:bg-[#a55328]
                   text-white font-semibold px-10 py-2 rounded-lg transition"
        >
            Save Changes
        </button>
    </x-slot>

</x-form-section>
