<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garuda Sakti Motor - Bengkel Mobil Terpercaya</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkBg: '#111111',
                        darkCard: '#181818',
                        darkBorder: '#262626',
                        brandRed: '#dc2626',
                        brandRedDark: '#991b1b',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111111;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #111111;
        }
        ::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #dc2626;
        }

        /* Scroll Entrance Animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating Animation */
        @keyframes float {
            0% { transform: translateY(0px) rotate(12deg); }
            50% { transform: translateY(-15px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(12deg); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Pulse Glow Animation */
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.08); }
        }
        .animate-pulse-glow {
            animation: pulseGlow 4s ease-in-out infinite;
        }

        /* Card Glow Hover */
        .hover-glow {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-glow:hover {
            border-color: rgba(220, 38, 38, 0.6);
            box-shadow: 0 10px 30px -10px rgba(220, 38, 38, 0.2);
            transform: translateY(-4px);
        }

        /* Animated Underline for Nav */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #dc2626;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-darkBg text-white antialiased selection:bg-red-600 selection:text-white">

    <!-- NAVBAR (Absolute, Sticky Effect on Scroll) -->
    <nav id="navbar" class="absolute top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-white/5 bg-gradient-to-b from-black/80 via-black/40 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Kiri: Logo -->
                <div class="flex items-center gap-3">
                    <a href="#beranda" class="text-xl sm:text-2xl font-black tracking-tight flex items-center gap-2 group text-white">
                        <span class="text-white group-hover:text-red-500 transition-colors duration-300">Garuda Sakti Motor</span>
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                    </a>
                </div>

                <!-- Tengah: Menu Navigasi -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="#beranda" class="nav-link text-white hover:text-red-500 transition-colors">Beranda</a>
                    <a href="#layanan" class="nav-link text-white hover:text-red-500 transition-colors">Layanan</a>
                    <a href="#promo" class="nav-link text-white hover:text-red-500 transition-colors">Booking</a>
                    <a href="#tentang" class="nav-link text-white hover:text-red-500 transition-colors">Tentang Kami</a>
                </div>

                <!-- Kanan: Tombol Auth (User Login / Guest Pop-up) -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <div class="flex items-center gap-3 bg-darkCard border border-darkBorder px-4 py-2 rounded-lg">
                            <i class="fa-solid fa-user-check text-red-500"></i>
                            <span class="text-sm font-semibold text-white">{{ Auth::user()->name }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-xs font-semibold text-gray-400 hover:text-red-500 transition-colors">
                                Logout
                            </button>
                        </form>
                    @else
                        <button onclick="openModal('daftar')" class="px-5 py-2.5 text-sm font-semibold text-white hover:text-red-500 transition-colors">
                            Daftar
                        </button>
                        <button onclick="openModal('login')" class="px-6 py-2.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-lg shadow-lg shadow-red-600/30 active:scale-95 transition-all">
                            Login
                        </button>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-white hover:text-red-500 focus:outline-none p-2 transition-colors">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#161616]/95 backdrop-blur-xl border-b border-darkBorder px-6 pt-4 pb-6 space-y-4">
            <a href="#beranda" class="block text-base font-medium text-white hover:text-red-500 transition-colors">Beranda</a>
            <a href="#layanan" class="block text-base font-medium text-white hover:text-red-500 transition-colors">Layanan</a>
            <a href="#promo" class="block text-base font-medium text-white hover:text-red-500 transition-colors">Booking</a>
            <a href="#tentang" class="block text-base font-medium text-white hover:text-red-500 transition-colors">Tentang Kami</a>
            <div class="pt-4 flex flex-col gap-3 border-t border-darkBorder">
                @auth
                    <div class="flex items-center gap-3 bg-darkCard border border-darkBorder px-4 py-2.5 rounded-lg">
                        <i class="fa-solid fa-user-check text-red-500"></i>
                        <span class="text-sm font-semibold text-white">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full py-2.5 text-center text-sm font-semibold text-gray-400 hover:text-red-500 border border-darkBorder rounded-lg">
                            Logout
                        </button>
                    </form>
                @else
                    <button onclick="openModal('daftar')" class="w-full py-2.5 text-center text-sm font-semibold text-white hover:text-red-500 border border-darkBorder rounded-lg transition-colors">Daftar</button>
                    <button onclick="openModal('login')" class="w-full py-2.5 text-center text-sm font-semibold text-white bg-red-600 rounded-lg shadow-md shadow-red-600/30">Login</button>
                @endauth
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative min-h-screen flex items-center pt-28 pb-16 overflow-hidden bg-darkBg">
        <!-- Pulse Glow Background Backgrounds -->
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-red-600/10 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>
        <div class="absolute bottom-10 right-10 w-[500px] h-[500px] bg-red-900/10 rounded-full blur-[150px] pointer-events-none"></div>

        <!-- Aksen Gradasi Merah Diagonal Kanan (Floating) -->
        <div class="absolute right-0 top-0 bottom-0 w-full lg:w-1/2 overflow-hidden pointer-events-none opacity-30 lg:opacity-100">
            <div class="absolute -right-32 -top-20 w-[850px] h-[120%] bg-gradient-to-bl from-red-900/50 via-red-950/20 to-transparent skew-x-12 animate-float"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 mb-6 px-3.5 py-1.5 rounded-full bg-red-950/60 border border-red-800/40 shadow-inner">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                    <span class="text-red-400 font-semibold tracking-widest text-xs uppercase">BENGKEL MOBIL TERPERCAYA</span>
                </div>

                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-[1.1] mb-6">
                    Servis tepat.<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-red-400 to-red-600">Tanpa antre lama.</span>
                </h1>

                <p class="text-base sm:text-lg text-gray-400 mb-10 leading-relaxed font-light max-w-2xl">
                    Booking servis online, pantau status pengerjaan, dan dapatkan harga transparan. Mekanik bersertifikat, garansi pengerjaan 30 hari.
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <button onclick="openBookingModal('Servis Umum')" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-xl shadow-red-600/30 hover:shadow-red-600/50 active:scale-95 transition-all duration-200 flex items-center gap-3 group">
                        <span>Booking Servis</span>
                        <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    <a href="#layanan" class="px-8 py-4 bg-darkCard hover:bg-darkBorder text-gray-200 border border-darkBorder font-semibold rounded-lg hover:text-white transition-all duration-200">
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS / PROGRESS & RATING SECTION -->
    <section class="py-14 bg-darkBg border-y border-darkBorder relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal">
                <div class="bg-darkCard border border-darkBorder p-7 rounded-2xl hover-glow group">
                    <p class="text-sm text-gray-400 mb-2 font-medium">Pelanggan puas</p>
                    <h3 class="text-3xl sm:text-4xl font-black text-white group-hover:text-red-500 transition-colors">4.800+</h3>
                </div>
                <div class="bg-darkCard border border-darkBorder p-7 rounded-2xl hover-glow group">
                    <p class="text-sm text-gray-400 mb-2 font-medium">Pengalaman</p>
                    <h3 class="text-3xl sm:text-4xl font-black text-white group-hover:text-red-500 transition-colors">12 tahun</h3>
                </div>
                <div class="bg-darkCard border border-darkBorder p-7 rounded-2xl hover-glow group">
                    <p class="text-sm text-gray-400 mb-2 font-medium">Garansi servis</p>
                    <h3 class="text-3xl sm:text-4xl font-black text-white group-hover:text-red-500 transition-colors">30 hari</h3>
                </div>
                <div class="bg-darkCard border border-darkBorder p-7 rounded-2xl hover-glow group">
                    <p class="text-sm text-gray-400 mb-2 font-medium">Rating</p>
                    <h3 class="text-3xl sm:text-4xl font-black text-white group-hover:text-red-500 transition-colors">4,9 / 5</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- PROMO SECTION -->
    <section id="promo" class="py-24 bg-darkBg relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 reveal">
                <span class="text-red-500 font-bold uppercase tracking-widest text-xs">PROMO</span>
                <h2 class="text-3xl sm:text-4xl font-black text-white mt-1">Penawaran Spesial</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 reveal">
                <!-- Promo Card 1 -->
                <div class="relative bg-gradient-to-br from-[#7f1d1d]/90 via-[#450a0a]/90 to-[#181818] border border-red-900/50 rounded-2xl p-8 sm:p-10 overflow-hidden shadow-2xl hover-glow group">
                    <div class="absolute -right-10 -bottom-10 w-56 h-56 bg-red-600/20 rounded-full blur-3xl pointer-events-none group-hover:bg-red-600/30 transition-all"></div>
                    <div class="relative z-10">
                        <span class="inline-block bg-red-600 text-white font-black text-2xl sm:text-3xl px-4 py-1.5 rounded-lg mb-4 shadow-lg shadow-red-900/40">DISKON 20%</span>
                        <h3 class="text-2xl font-bold text-white mb-2">Servis Berkala Oktober</h3>
                        <p class="text-gray-300 text-sm mb-8 font-light">Berlaku hingga 31 Oktober 2026</p>
                        <button onclick="openBookingModal('Servis Berkala Oktober - Diskon 20%')" class="px-6 py-3 bg-transparent hover:bg-white/10 text-white border border-white/30 hover:border-white font-semibold rounded-lg transition-all text-sm active:scale-95">
                            Booking sekarang
                        </button>
                    </div>
                </div>

                <!-- Promo Card 2 -->
                <div class="relative bg-gradient-to-br from-[#991b1b]/80 via-[#450a0a]/80 to-[#181818] border border-red-900/50 rounded-2xl p-8 sm:p-10 overflow-hidden shadow-2xl hover-glow group">
                    <div class="absolute -right-10 -bottom-10 w-56 h-56 bg-red-600/20 rounded-full blur-3xl pointer-events-none group-hover:bg-red-600/30 transition-all"></div>
                    <div class="relative z-10">
                        <span class="inline-block bg-white text-red-700 font-black text-2xl sm:text-3xl px-4 py-1.5 rounded-lg mb-4 shadow-lg">GRATIS</span>
                        <h3 class="text-2xl font-bold text-white mb-2">Cek 20 titik kendaraan</h3>
                        <p class="text-gray-300 text-sm mb-8 font-light">Untuk setiap booking ganti oli</p>
                        <button onclick="openBookingModal('Gratis Cek 20 Titik (Ganti Oli)')" class="px-6 py-3 bg-transparent hover:bg-white/10 text-white border border-white/30 hover:border-white font-semibold rounded-lg transition-all text-sm active:scale-95">
                            Booking sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN KAMI SECTION -->
    <section id="layanan" class="py-24 bg-darkBg border-t border-darkBorder">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-12 gap-4 reveal">
                <h2 class="text-3xl sm:text-4xl font-black text-white">Layanan Kami</h2>
                <button onclick="openAllServicesModal()" class="px-5 py-2.5 bg-darkCard hover:bg-darkBorder border border-darkBorder text-gray-300 hover:text-white text-sm font-semibold rounded-lg transition-all active:scale-95">
                    Semua layanan
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal">
                <!-- 1. Ganti Oli -->
                <div onclick="openBookingModal('Ganti Oli')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-droplet text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Ganti Oli</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 45 menit</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp250.000</p>
                    </div>
                </div>

                <!-- 2. Servis Berkala -->
                <div onclick="openBookingModal('Servis Berkala')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-screwdriver-wrench text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Servis Berkala</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 2 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp450.000</p>
                    </div>
                </div>

                <!-- 3. Tune Up -->
                <div onclick="openBookingModal('Tune Up')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-sliders text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Tune Up</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 3 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp650.000</p>
                    </div>
                </div>

                <!-- 4. Servis Rem -->
                <div onclick="openBookingModal('Servis Rem')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-bullseye text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Servis Rem</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 1,5 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp350.000</p>
                    </div>
                </div>

                <!-- 5. Spooring & Balancing -->
                <div onclick="openBookingModal('Spooring & Balancing')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-compass text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Spooring & Balancing</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 1,5 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp300.000</p>
                    </div>
                </div>

                <!-- 6. AC Service -->
                <div onclick="openBookingModal('AC Service')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-snowflake text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">AC Service</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 2 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp400.000</p>
                    </div>
                </div>

                <!-- 7. Aki & Kelistrikan -->
                <div onclick="openBookingModal('Aki & Kelistrikan')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-car-battery text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Aki & Kelistrikan</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi 1 jam</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp200.000</p>
                    </div>
                </div>

                <!-- 8. Perbaikan Umum -->
                <div onclick="openBookingModal('Perbaikan Umum')" class="bg-darkCard border border-darkBorder p-6 rounded-2xl hover-glow cursor-pointer transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 bg-red-950/60 border border-red-900/50 rounded-xl flex items-center justify-center text-red-500 mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-car text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-500 transition-colors">Perbaikan Umum</h3>
                        <p class="text-xs text-gray-400 mb-6 font-light">Durasi Estimasi di bengkel</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Mulai</p>
                        <p class="text-xl font-extrabold text-white">Rp150.000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section id="tentang" class="py-24 bg-[#141414] border-t border-darkBorder relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center reveal">
                <div>
                    <span class="text-red-500 font-bold uppercase tracking-widest text-xs">TENTANG KAMI</span>
                    <h2 class="text-3xl sm:text-4xl font-black text-white mt-1 mb-6">Garuda Sakti Motor</h2>
                    <p class="text-gray-300 leading-relaxed mb-8 font-light">
                        Bengkel mobil profesional yang mengutamakan transparansi, kecepatan pengerjaan, dan kualitas suku cadang orisinil. Didukung oleh mekanik berpengalaman bersertifikat resmi serta peralatan diagnostik modern.
                    </p>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-red-950/60 border border-red-900/50 flex items-center justify-center text-red-500 shrink-0 mt-1">
                                <i class="fa-solid fa-location-dot text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">Alamat Bengkel</h4>
                                <p class="text-gray-400 text-sm font-light">Perum Harapan Kita, Jl. Pawon Raya No.14-16, Bencongan, Kec. Karawaci, Kabupaten Tangerang, Banten 15810</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-red-950/60 border border-red-900/50 flex items-center justify-center text-red-500 shrink-0 mt-1">
                                <i class="fa-solid fa-clock text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">Jam Operasional</h4>
                                <p class="text-gray-400 text-sm font-light">Senin - Minggu: 08.00 - 17.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-darkCard border border-darkBorder p-8 rounded-2xl shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-6">Hubungi & Lokasi Kami</h3>
                    <div class="space-y-4">
                        <a href="tel:085716851004" class="flex items-center gap-4 p-4 rounded-xl bg-darkBg border border-darkBorder hover:border-red-600/50 transition-all group">
                            <div class="w-10 h-10 rounded-lg bg-red-950/50 flex items-center justify-center text-red-500">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Telepon / WhatsApp</p>
                                <p class="text-sm font-semibold text-white group-hover:text-red-500 transition-colors">085716851004</p>
                            </div>
                        </a>

                        <a href="mailto:garudasakti@gmail.com" class="flex items-center gap-4 p-4 rounded-xl bg-darkBg border border-darkBorder hover:border-red-600/50 transition-all group">
                            <div class="w-10 h-10 rounded-lg bg-red-950/50 flex items-center justify-center text-red-500">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Email Resmi</p>
                                <p class="text-sm font-semibold text-white group-hover:text-red-500 transition-colors">garudasakti@gmail.com</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER (Presisi Gambar Acuan) -->
    <footer class="bg-[#0e0e0e] border-t border-darkBorder pt-16 pb-12 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pb-16">
                <!-- Kolom 1: Tautan Cepat -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Tautan Cepat</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#beranda" class="text-red-500 hover:underline">Beranda</a></li>
                        <li><a href="#promo" class="text-gray-300 hover:text-white transition-colors">Booking</a></li>
                        <li><a href="#layanan" class="text-gray-300 hover:text-white transition-colors">Service</a></li>
                        <li><a href="#tentang" class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>

                <!-- Kolom 2: Hubungi Kami -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Hubungi Kami</h3>
                    <div class="space-y-5 text-sm text-gray-300 leading-relaxed font-light">
                        <p>Perum Harapan Kita, Jl. Pawon Raya No.14-16, Bencongan, Kec. Karawaci, Kabupaten Tangerang, Banten 15810</p>
                        <p class="font-normal">garudasakti@gmail.com</p>
                        <p class="font-normal">085716851004</p>
                    </div>
                </div>

                <!-- Kolom 3: Social Media -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Social Media</h3>
                    <div class="flex items-center gap-4">
                        <!-- Instagram (Coral/Merah Muda) -->
                        <a href="https://instagram.com" target="_blank" class="w-12 h-12 rounded-full bg-[#e15b64] text-white flex items-center justify-center text-xl shadow-lg hover:scale-110 transition-transform">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <!-- YouTube (Abu-abu Terang) -->
                        <a href="https://youtube.com" target="_blank" class="w-12 h-12 rounded-full bg-[#d8d8d8] text-[#111111] flex items-center justify-center text-xl shadow-lg hover:scale-110 transition-transform">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <!-- TikTok (Abu-abu Terang) -->
                        <a href="https://tiktok.com" target="_blank" class="w-12 h-12 rounded-full bg-[#d8d8d8] text-[#111111] flex items-center justify-center text-xl shadow-lg hover:scale-110 transition-transform">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="border-t border-darkBorder pt-8 text-center">
                <p class="text-xs font-medium text-gray-400 tracking-wide">
                    Garuda Sakti Motor 2026©
                </p>
            </div>
        </div>
    </footer>

    <!-- MODAL CONTAINER (POPUP LOGIN & DAFTAR) -->
    <div id="app-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden transition-all duration-300">
        <div class="relative w-full max-w-md bg-[#161616] border border-[#282828] rounded-2xl p-6 sm:p-8 shadow-2xl overflow-hidden">
            <!-- Close Button -->
            <button onclick="closeModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/10 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Dynamic Modal Content -->
            <div id="modal-content"></div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Scroll Entrance Animation
            const revealElements = document.querySelectorAll('.reveal');
            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                revealElements.forEach(el => {
                    if (el) {
                        const elementTop = el.getBoundingClientRect().top;
                        if (elementTop < windowHeight - 80) {
                            el.classList.add('active');
                        }
                    }
                });
            };

            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll();

            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Navbar Background Change on Scroll
            const navbar = document.getElementById('navbar');
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 30) {
                        navbar.classList.add('bg-[#111111]/95', 'shadow-2xl', 'backdrop-blur-md', 'border-white/10');
                        navbar.classList.remove('bg-gradient-to-b');
                    } else {
                        navbar.classList.remove('bg-[#111111]/95', 'shadow-2xl', 'backdrop-blur-md', 'border-white/10');
                        navbar.classList.add('bg-gradient-to-b');
                    }
                });
            }
        });

        // Open Modal Function (Login / Daftar)
        function openModal(type) {
            const modal = document.getElementById('app-modal');
            const content = document.getElementById('modal-content');
            if (!modal || !content) return;
            modal.classList.remove('hidden');

            if (type === 'login') {
                content.innerHTML = `
                    <h2 class="text-3xl font-black text-white mb-1 tracking-tight">Masuk</h2>
                    <p class="text-sm text-gray-400 mb-6 font-light">Masuk untuk booking dan melihat riwayat servis.</p>
                    
                    <!-- Google Login Button -->
                    <button type="button" class="w-full flex items-center justify-center gap-3 bg-[#1e1e1e] hover:bg-[#252525] border border-[#333333] text-white py-3 px-4 rounded-xl font-medium text-sm transition-all mb-6 active:scale-95">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                        </svg>
                        <span>Lanjutkan dengan Google</span>
                    </button>

                    <div class="text-center text-xs text-gray-500 mb-6 font-medium">atau dengan email</div>

                    <form onsubmit="submitLogin(event)" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">EMAIL</label>
                            <input type="email" id="login-email" name="email" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm transition-colors" placeholder="nama@email.com">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">PASSWORD</label>
                            <input type="password" id="login-password" name="password" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm transition-colors" placeholder="••••••••">
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-[#a81c24] hover:bg-red-700 text-white font-bold rounded-xl shadow-lg shadow-red-900/30 active:scale-95 transition-all text-sm mt-2">
                            Masuk
                        </button>
                    </form>

                    <p class="text-center text-sm text-gray-400 mt-6 font-light">
                        Belum punya akun? <button onclick="openModal('daftar')" class="text-white font-semibold underline underline-offset-2 hover:text-red-500">Daftar</button>
                    </p>
                `;
            } else if (type === 'daftar') {
                content.innerHTML = `
                    <h2 class="text-3xl font-black text-white mb-1 tracking-tight">Daftar Akun</h2>
                    <p class="text-sm text-gray-400 mb-6 font-light">Buat akun pelanggan untuk booking servis.</p>
                    
                    <!-- Google Login Button -->
                    <button type="button" class="w-full flex items-center justify-center gap-3 bg-[#1e1e1e] hover:bg-[#252525] border border-[#333333] text-white py-3 px-4 rounded-xl font-medium text-sm transition-all mb-6 active:scale-95">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                        </svg>
                        <span>Lanjutkan dengan Google</span>
                    </button>

                    <div class="text-center text-xs text-gray-500 mb-6 font-medium">atau dengan email</div>

                    <form onsubmit="submitRegister(event)" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">NAMA LENGKAP</label>
                            <input type="text" id="reg-name" name="name" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm transition-colors" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">EMAIL</label>
                            <input type="email" id="reg-email" name="email" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm transition-colors" placeholder="nama@email.com">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">PASSWORD</label>
                            <input type="password" id="reg-password" name="password" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm transition-colors" placeholder="Minimal 6 karakter">
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-[#a81c24] hover:bg-red-700 text-white font-bold rounded-xl shadow-lg shadow-red-900/30 active:scale-95 transition-all text-sm mt-2">
                            Daftar
                        </button>
                    </form>

                    <p class="text-center text-sm text-gray-400 mt-6 font-light">
                        Sudah punya akun? <button onclick="openModal('login')" class="text-white font-semibold underline underline-offset-2 hover:text-red-500">Masuk</button>
                    </p>
                `;
            }
        }

        // Open Booking Modal
        function openBookingModal(packageName) {
            const modal = document.getElementById('app-modal');
            const content = document.getElementById('modal-content');
            if (!modal || !content) return;
            modal.classList.remove('hidden');

            content.innerHTML = `
                <h2 class="text-2xl font-extrabold text-white mb-1">Booking Servis</h2>
                <p class="text-xs text-red-500 font-bold uppercase tracking-wider mb-6">Paket: ${packageName}</p>
                
                <form onsubmit="handleBookingSubmit(event)" class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">NAMA PEMILIK</label>
                        <input type="text" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm" placeholder="Nama Anda">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">NOMOR POLISI (NOPOL)</label>
                        <input type="text" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm" placeholder="B 1234 XYZ">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-2 tracking-wider">TANGGAL SERVIS</label>
                        <input type="date" required class="w-full bg-[#222222] border border-[#2d2d2d] focus:border-red-600 rounded-lg px-4 py-3 text-white focus:outline-none text-sm">
                    </div>
                    <button type="submit" class="w-full py-3.5 bg-[#a81c24] hover:bg-red-700 text-white font-bold rounded-xl shadow-lg shadow-red-900/30 active:scale-95 transition-all text-sm mt-2">
                        Konfirmasi Booking
                    </button>
                </form>
            `;
        }

        function openAllServicesModal() {
            openBookingModal('Konsultasi & Layanan Umum');
        }

        function closeModal() {
            const modal = document.getElementById('app-modal');
            if (modal) modal.classList.add('hidden');
        }

        // AJAX Handler Form Login
        async function submitLogin(e) {
            e.preventDefault();
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;

            try {
                const res = await fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await res.json();
                if (res.ok) {
                    showNotification(data.message, 'success');
                    // Pindah ke dashboard jika admin, atau reload jika pelanggan biasa
                    setTimeout(() => {
                        window.location.href = data.redirect_url || '/';
                    }, 1000);
                } else {
                    showNotification(data.message || 'Login gagal!', 'error');
                }
            } catch (err) {
                showNotification('Terjadi kesalahan sistem!', 'error');
            }
        }

        // AJAX Handler Form Register
        async function submitRegister(e) {
            e.preventDefault();
            const name = document.getElementById('reg-name').value;
            const email = document.getElementById('reg-email').value;
            const password = document.getElementById('reg-password').value;

            try {
                const res = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ name, email, password })
                });

                const data = await res.json();
                if (res.ok) {
                    showNotification(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showNotification(data.message || 'Pendaftaran gagal!', 'error');
                }
            } catch (err) {
                showNotification('Terjadi kesalahan sistem!', 'error');
            }
        }

        function handleBookingSubmit(e) {
            e.preventDefault();
            showNotification('Booking berhasil dikirim! Tim kami akan menghubungi Anda.', 'success');
        }

        function showNotification(msg, type = 'success') {
            closeModal();
            const banner = document.createElement('div');
            banner.className = `fixed bottom-6 right-6 z-50 ${type === 'success' ? 'bg-red-600 shadow-red-900/50' : 'bg-amber-600 shadow-amber-900/50'} text-white px-6 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 text-sm font-semibold border border-white/10`;
            banner.innerHTML = `<i class="fa-solid ${type === 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation'} text-lg"></i> <span>${msg}</span>`;
            document.body.appendChild(banner);
            setTimeout(() => banner.remove(), 4000);
        }
    </script>
</body>
</html>