<x-guest-layout>
@include('layouts.header')
    <!-- CONTACT SECTION -->
    <section class="max-w-5xl mx-auto px-6 py-12">

        <h1 class="text-center text-3xl md:text-4xl font-bold text-[#0d1b2a] mb-4">
            CONTACT US
        </h1>

        <p class="text-center text-base text-[#b85c2e] mb-8">
            To receive personalised advice or obtain more information about our creations,
            contact our Zevana ambassador or visit our
            <a href="#" class="underline font-semibold">FAQs.</a>
        </p>

        <!-- Info Box -->
        <div class="bg-[#ffffff] text-[#0d1b2a] p-5 font-bold mb-10 rounded-md">
            By mail <br>
            If you have any questions or inquiries about our products, please do not hesitate
            to contact us. Our ambassadors will get back to you.
        </div>

        <!-- Contact Container -->
        <div class="flex flex-col md:flex-row gap-10">

            <!-- Contact Form -->
            <div class="flex-1">
                <form method="POST" action="#">
                    @csrf

                    <input type="text"
                           name="name"
                           placeholder="Full Name"
                           class="w-full border-b-2 border-[#0d1b2a] py-2 mb-5 focus:outline-none">

                    <input type="email"
                           name="email"
                           placeholder="E-mail"
                           class="w-full border-b-2 border-[#0d1b2a] py-2 mb-5 focus:outline-none">

                    <textarea name="message"
                              placeholder="Message"
                              class="w-full border-b-2 border-[#0d1b2a] py-2 mb-5 h-28 resize-none focus:outline-none"></textarea>

                    <button type="submit"
                            class="bg-[#0d1b2a] text-white px-6 py-3 rounded-full hover:bg-[#142d4c] transition">
                        Contact Us
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="flex-1 flex flex-col gap-6">

                <div>
                    <h3 class="text-lg font-semibold text-[#0d1b2a]">Contact</h3>
                    <p class="text-sm text-gray-700">hi@zevana.com</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#0d1b2a]">Based in</h3>
                    <p class="text-sm text-gray-700">
                        Sri Lanka <br>
                        South Asia
                    </p>
                </div>

                <div class="flex gap-4 text-xl mt-2">
                    <a href="#" class="text-[#0d1b2a] hover:text-[#b85c2e]">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-[#0d1b2a] hover:text-[#b85c2e]">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-[#0d1b2a] hover:text-[#b85c2e]">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

            </div>
        </div>

    </section>
@include('layouts.footer')
</x-guest-layout>
