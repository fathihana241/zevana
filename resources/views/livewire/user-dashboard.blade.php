<div class="bg-gray-100 min-h-screen px-6 py-10">

    <!-- Header Section -->
    <div class="bg-[#c96833] text-white text-center py-10 px-6 rounded-lg">
        <h1 class="text-3xl font-bold mb-2">HEY, {{ strtoupper(Auth::user()->name) }}!</h1>
        <p class="mb-6">Welcome to your dashboard, your one-stop-shop for all your recent Zevana account activity.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('home') }}" class="px-6 py-2 border border-white rounded-md hover:bg-white hover:text-[#c96833] transition">
                DASHBOARD
            </a>
            <a href="{{ route('cart') }}" class="px-6 py-2 border border-white rounded-md hover:bg-white hover:text-[#c96833] transition">
                ORDER HISTORY
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto mt-12 flex flex-col md:flex-row gap-12">

        <!-- Left Section -->
        <div class="flex-1 space-y-10">

            <!-- My Info -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-2">My Info</h2>
                <p class="font-medium mb-1">Personal Information</p>
                <p>Name: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
            </div>

            <!-- Address Book -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-2">Address Book</h2>
                <a href="{{ route('dashboard') }}" class="text-blue-600 underline">Manage addresses(0)</a>
                <p class="text-gray-600">You have not yet added an address.</p>
            </div>

        </div>

        <!-- Right Section (Illustration) -->
        <div class="w-full md:w-1/3 flex justify-center">
            <img src="{{ asset('images/us1.jpeg') }}" alt="Dashboard Illustration" class="max-w-xs rounded-lg shadow">
        </div>

    </div>

</div>
