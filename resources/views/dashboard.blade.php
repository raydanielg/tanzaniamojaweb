<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-lg fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50 lg:static lg:inset-0 lg:translate-x-0">
            <div class="p-6 border-b border-blue-500 flex justify-between items-center">
                <h2 class="text-2xl font-bold">{{ config('app.name') }}</h2>
                <button onclick="toggleSidebar()" class="lg:hidden text-white focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 text-white hover:bg-blue-700 transition {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="#" class="block px-6 py-3 text-white hover:bg-blue-700 transition">
                    <i class="fas fa-list mr-2"></i> Categories
                </a>
                <a href="#" class="block px-6 py-3 text-white hover:bg-blue-700 transition">
                    <i class="fas fa-globe mr-2"></i> Site Types
                </a>
                <a href="#" class="block px-6 py-3 text-white hover:bg-blue-700 transition">
                    <i class="fas fa-cog mr-2"></i> Setting
                </a>
                <a href="#" class="block px-6 py-3 text-white hover:bg-blue-700 transition">
                    <i class="fas fa-eye mr-2"></i> Visitors
                </a>
                <a href="#" class="block px-6 py-3 text-white hover:bg-blue-700 transition">
                    <i class="fas fa-comments mr-2"></i> Feedbacks
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-0">
            <!-- Header -->
            <header class="bg-white shadow-md border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 focus:outline-none lg:hidden" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Welcome, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
                    <!-- Cards -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600">Visitors</p>
                                <p class="text-2xl font-bold text-blue-600">12,345</p>
                            </div>
                            <i class="fas fa-eye text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600">Total Posts</p>
                                <p class="text-2xl font-bold text-green-600">567</p>
                            </div>
                            <i class="fas fa-newspaper text-green-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600">Monthly Visitors</p>
                                <p class="text-2xl font-bold text-purple-600">8,901</p>
                            </div>
                            <i class="fas fa-calendar-alt text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600">Comments</p>
                                <p class="text-2xl font-bold text-yellow-600">1,234</p>
                            </div>
                            <i class="fas fa-comments text-yellow-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600">Revenue</p>
                                <p class="text-2xl font-bold text-red-600">$45,678</p>
                            </div>
                            <i class="fas fa-dollar-sign text-red-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                    <p class="text-gray-600">You're logged in! This is your dashboard.</p>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Visitor Trends Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Visitor Trends (Last 7 Days)</h3>
                        <canvas id="visitorChart" width="400" height="200"></canvas>
                    </div>
                    <!-- Analytics Reports Pie Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Analytics Reports</h3>
                        <canvas id="analyticsChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Additional Charts -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Bar Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm font-semibold mb-4">Monthly Revenue</h3>
                        <canvas id="revenueChart" width="300" height="150"></canvas>
                    </div>
                    <!-- Doughnut Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm font-semibold mb-4">Traffic Sources</h3>
                        <canvas id="trafficChart" width="300" height="150"></canvas>
                    </div>
                    <!-- Line Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm font-semibold mb-4">User Engagement</h3>
                        <canvas id="engagementChart" width="300" height="150"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }
        }

        // Visitor Trends Line Chart
        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Visitors',
                    data: [1200, 1900, 3000, 5000, 2000, 3000, 4500],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Analytics Reports Pie Chart
        const analyticsCtx = document.getElementById('analyticsChart').getContext('2d');
        new Chart(analyticsCtx, {
            type: 'pie',
            data: {
                labels: ['Desktop', 'Mobile', 'Tablet'],
                datasets: [{
                    data: [60, 30, 10],
                    backgroundColor: ['#3B82F6', '#10B981', '#F59E0B'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true
            }
        });

        // Monthly Revenue Bar Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [12000, 19000, 30000, 50000, 20000, 30000],
                    backgroundColor: '#EF4444',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Traffic Sources Doughnut Chart
        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        new Chart(trafficCtx, {
            type: 'doughnut',
            data: {
                labels: ['Organic', 'Direct', 'Social', 'Referral'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ['#10B981', '#3B82F6', '#8B5CF6', '#F59E0B'],
                }]
            },
            options: {
                responsive: true
            }
        });

        // User Engagement Line Chart
        const engagementCtx = document.getElementById('engagementChart').getContext('2d');
        new Chart(engagementCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Engagement',
                    data: [200, 400, 300, 500],
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
