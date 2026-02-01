<div class="flex min-h-screen"> <!-- ✅ SINGLE ROOT DIV -->

    <!-- SIDEBAR -->
    <aside class="w-20 bg-slate-900 text-slate-300 flex flex-col items-center py-4 space-y-4">

        <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center text-white font-bold">
            Z
        </div>

        <a href="/dashboard" class="w-11 h-11 flex items-center justify-center rounded-xl bg-slate-800 text-white">
            <i class="fa-solid fa-house"></i>
        </a>

        <a href="/orders" class="w-11 h-11 flex items-center justify-center rounded-xl hover:bg-slate-800">
            <i class="fa-solid fa-box"></i>
        </a>

      <a href="{{ route('admin.dashboard.api') }}" class="w-11 h-11 flex items-center justify-center rounded-xl hover:bg-slate-800">
    <i class="fa-solid fa-chart-simple"></i>
</a>


        <a href="/users" class="w-11 h-11 flex items-center justify-center rounded-xl hover:bg-slate-800">
            <i class="fa-solid fa-users"></i>
        </a>

        <div class="flex-1"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-11 h-11 rounded-xl hover:bg-slate-800">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">ZEVANA Admin Dashboard</h1>

            <div class="flex items-center gap-4">
                <input type="text"
                       placeholder="Search..."
                       class="px-4 py-2 rounded-xl border focus:outline-none focus:ring w-64">

                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-orange-400 to-yellow-400 text-white flex items-center justify-center font-bold">
                        {{ auth()->user()->name[0] ?? 'A' }}
                    </div>
                    <div>
                        <p class="font-semibold text-sm">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- KPI -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500 text-sm">Total Revenue</p>
                <h2 class="text-2xl font-bold mt-2">Rs {{ $totalRevenue ?? 4444571.25 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500 text-sm">Orders</p>
                <h2 class="text-2xl font-bold mt-2">{{ $totalOrders ?? 78 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500 text-sm">Customers</p>
                <h2 class="text-2xl font-bold mt-2">{{ $totalUsers ?? 9 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500 text-sm">Conversion</p>
                <h2 class="text-2xl font-bold mt-2">8.2%</h2>
            </div>

        </div>

        <!-- CHARTS -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl shadow p-6 xl:col-span-2">
                <h3 class="font-semibold mb-4">Revenue Overview</h3>
                <canvas id="revenueChart" height="120"></canvas>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-semibold mb-4">Category Revenue</h3>
                <canvas id="categoryChart" height="200"></canvas>
            </div>

        </div>

    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const revenueCtx = document.getElementById('revenueChart');
    const categoryCtx = document.getElementById('categoryChart');

    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000,14000,15000,17000,18000,20000,22000,23000,24000,25000,27000,29000],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99,102,241,0.2)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    }

    if (categoryCtx) {
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Jewelry','Skin Care','Watch','Fragrance'],
                datasets: [{
                    data: [40,25,20,15],
                    backgroundColor: ['#6366f1','#f97316','#facc15','#38bdf8']
                }]
            }
        });
    }

});
</script>
