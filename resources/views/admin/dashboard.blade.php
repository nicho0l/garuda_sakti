<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Garuda Sakti Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #0f0f0f; color: #ffffff; }
    </style>
</head>
<body class="antialiased flex h-screen bg-[#0f0f0f]">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#161616] border-r border-[#262626] flex flex-col justify-between">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-[#262626]">
                <a href="#" class="text-xl font-black text-white flex items-center gap-2">
                    <span>Garuda Sakti</span>
                    <span class="text-xs bg-red-600 text-white px-2 py-0.5 rounded font-bold uppercase">Admin</span>
                </a>
            </div>
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600 text-white font-semibold text-sm">
                    <i class="fa-solid fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-[#222222] font-medium text-sm transition-all">
                    <i class="fa-solid fa-calendar-check w-5"></i>
                    <span>Data Booking</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-[#222222] font-medium text-sm transition-all">
                    <i class="fa-solid fa-users w-5"></i>
                    <span>Pelanggan</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-[#262626]">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-red-500 hover:bg-red-950/30 font-semibold text-sm transition-all">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        <!-- Topbar -->
        <header class="h-20 bg-[#161616] border-b border-[#262626] flex items-center justify-between px-8">
            <h1 class="text-xl font-bold text-white">Ringkasan Sistem</h1>
            <div class="flex items-center gap-3 bg-[#222222] border border-[#333333] px-4 py-2 rounded-xl">
                <i class="fa-solid fa-user-shield text-red-500"></i>
                <span class="text-sm font-semibold text-white">{{ Auth::user()->name }}</span>
            </div>
        </header>

        <!-- Body Content -->
        <div class="p-8 space-y-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#161616] border border-[#262626] p-6 rounded-2xl">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Booking</p>
                    <h3 class="text-3xl font-black text-white">24</h3>
                </div>
                <div class="bg-[#161616] border border-[#262626] p-6 rounded-2xl">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Servis Hari Ini</p>
                    <h3 class="text-3xl font-black text-red-500">8</h3>
                </div>
                <div class="bg-[#161616] border border-[#262626] p-6 rounded-2xl">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Pelanggan</p>
                    <h3 class="text-3xl font-black text-white">142</h3>
                </div>
            </div>

            <!-- Table Info -->
            <div class="bg-[#161616] border border-[#262626] rounded-2xl p-6">
                <h2 class="text-lg font-bold text-white mb-4">Booking Terbaru</h2>
                <div class="text-sm text-gray-400">
                    Belum ada data booking baru.
                </div>
            </div>
        </div>
    </main>

</body>
</html>