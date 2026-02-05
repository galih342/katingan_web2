<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa - Kabupaten Katingan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <nav class="fixed w-full z-50 glass-nav border-b border-gray-100 transition-all duration-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-katingan.png') }}" alt="Logo Katingan" class="h-10 w-auto">
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-none">Kabupaten Katingan</h1>
                        <p class="text-xs text-green-700 font-bold tracking-wide">PENYANG HINJE SIMPEI</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-8 font-medium text-sm">
                    <a href="#beranda" class="text-gray-600 hover:text-green-700 transition">Beranda</a>
                    <a href="#layanan" class="text-gray-600 hover:text-green-700 transition">Layanan</a>
                    <a href="#wisata" class="text-gray-600 hover:text-green-700 transition">Wisata</a>
                    <a href="#statistik" class="text-gray-600 hover:text-green-700 transition">Statistik</a>
                    <a href="#kontak" class="text-gray-600 hover:text-green-700 transition">Kontak</a>
                </div>

                <div class="hidden md:flex items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-green-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:bg-green-800 transition shadow-lg">
                                <i class="fas fa-gauge-high mr-2"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-green-700 font-medium text-sm px-4">Login Pegawai <i class="fas fa-arrow-right ml-1"></i></a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden h-screen flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg-katingan.jpg') }}" alt="Jembatan Katingan" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/90 via-green-900/60 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl text-white">
                <span class="inline-block py-1 px-3 rounded-full bg-yellow-500/20 border border-yellow-400/50 text-yellow-300 text-xs font-bold tracking-wider mb-6">
                    KASONGAN - BUMI PENYANG HINJE SIMPEI
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    Pelayanan Digital <br> <span class="text-yellow-400">Desa Terpadu</span>
                </h1>
                <p class="text-lg text-gray-200 mb-8 leading-relaxed">
                    Mewujudkan tata kelola pemerintahan desa di Kabupaten Katingan yang transparan, akuntabel, dan melayani sepenuh hati.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#layanan" class="bg-yellow-500 text-green-900 px-8 py-4 rounded-full font-bold text-center hover:bg-yellow-400 transition shadow-lg flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Ajukan Surat
                    </a>
                    <a href="#statistik" class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-full font-bold text-center hover:bg-white/20 transition flex items-center justify-center gap-2">
                        <i class="fas fa-map"></i> Profil Wilayah
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-green-600 font-bold tracking-wide uppercase text-sm mb-2">Layanan Mandiri</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Urus Administrasi Dari Rumah</h3>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Sistem terintegrasi untuk seluruh desa di wilayah Kecamatan Katingan Hilir dan sekitarnya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="group relative bg-white rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 text-2xl mb-6">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-3">Buat Surat Pengantar</h4>
                    <p class="text-gray-500 mb-8">Pengajuan Surat Keterangan Usaha, Domisili, hingga Pengantar SKCK secara online.</p>
                    <a href="{{ route('layanan.create') }}" class="inline-flex items-center text-green-700 font-bold hover:text-green-900 transition">
                        Buat Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="group relative bg-white rounded-3xl p-8 border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-3">Cek Status Pengajuan</h4>
                    <p class="text-gray-500 mb-8">Pantau proses tanda tangan kepala desa/lurah langsung dari HP Anda menggunakan NIK.</p>
                    <a href="{{ route('layanan.track') }}" class="inline-flex items-center text-blue-700 font-bold hover:text-blue-900 transition">
                        Lacak Surat <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="wisata" class="py-24 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-green-600 font-bold tracking-wide uppercase text-sm mb-2">Destinasi Unggulan</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Pesona Alam Katingan</h3>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Nikmati keindahan alam, situs bersejarah, dan konservasi lingkungan yang ada di Bumi Penyang Hinje Simpei.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="h-60 overflow-hidden relative">
                        <img src="{{ asset('images/bukit-batu.jpg') }}" alt="Bukit Batu" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-green-700 shadow-sm">
                            Sejarah & Alam
                        </div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Situs Bukit Batu</h4>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">Tempat pertapaan Pahlawan Nasional Tjilik Riwut. Menawarkan pemandangan batu granit alami yang unik dan nuansa spiritual yang tenang.</p>
                        <a href="https://www.google.com/maps/search/Bukit+Batu+Katingan" target="_blank" class="inline-flex items-center text-green-700 font-bold text-sm hover:underline">
                            Lihat Lokasi <i class="fas fa-map-marker-alt ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="h-60 overflow-hidden relative">
                        <img src="{{ asset('images/tn-sebangau.jpg') }}" alt="TN Sebangau" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-blue-700 shadow-sm">
                            Konservasi
                        </div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">TN Sebangau</h4>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">Surga hutan rawa gambut tropis. Rumah bagi populasi Orangutan liar dan berbagai flora fauna eksotis khas Kalimantan Tengah.</p>
                        <a href="https://www.google.com/maps/search/Taman+Nasional+Sebangau" target="_blank" class="inline-flex items-center text-blue-700 font-bold text-sm hover:underline">
                            Lihat Lokasi <i class="fas fa-map-marker-alt ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="h-60 overflow-hidden relative">
                        <img src="{{ asset('images/kebun-raya.jpg') }}" alt="Kebun Raya" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-yellow-600 shadow-sm">
                            Edukasi
                        </div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Kebun Raya Katingan</h4>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">Pusat konservasi tumbuhan buah-buahan tropis. Tempat yang cocok untuk wisata edukasi keluarga dan penelitian botani.</p>
                        <a href="https://www.google.com/maps/search/Kebun+Raya+Katingan" target="_blank" class="inline-flex items-center text-yellow-600 font-bold text-sm hover:underline">
                            Lihat Lokasi <i class="fas fa-map-marker-alt ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistik" class="py-20 bg-green-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/black-scales.png');"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h3 class="text-2xl font-bold">Data Kependudukan Kabupaten Katingan</h3>
                <p class="text-green-200 text-sm mt-2">Sumber: Data Konsolidasi Bersih (DKB) Disdukcapil & BPS Katingan (Est. 2024)</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6 border border-green-700 rounded-2xl bg-green-800/50">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">181.963</div>
                    <div class="text-sm text-gray-300 uppercase tracking-widest">Jiwa Penduduk</div>
                </div>
                <div class="p-6 border border-green-700 rounded-2xl bg-green-800/50">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">13</div>
                    <div class="text-sm text-gray-300 uppercase tracking-widest">Kecamatan</div>
                </div>
                <div class="p-6 border border-green-700 rounded-2xl bg-green-800/50">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">161</div>
                    <div class="text-sm text-gray-300 uppercase tracking-widest">Desa & Kelurahan</div>
                </div>
                <div class="p-6 border border-green-700 rounded-2xl bg-green-800/50">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">20.382</div>
                    <div class="text-sm text-gray-300 uppercase tracking-widest">Luas Wilayah (km²)</div>
                </div>
            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-white border-t border-gray-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <img src="{{ asset('images/logo-katingan.png') }}" alt="Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold text-gray-900">Desa Digital</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Aplikasi pelayanan masyarakat terpadu untuk wilayah Kabupaten Katingan, Kalimantan Tengah.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-6">Alamat Kantor</h4>
                    <ul class="space-y-4 text-sm text-gray-500">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                            <span>Jl. Garuda No. 1, Komplek Perkantoran Pemerintah Daerah,<br>Kec. Katingan Hilir, Kab. Katingan 74413</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-green-600"></i>
                            <span>(0536) 4043xxx</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-6">Jam Pelayanan</h4>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li class="flex justify-between border-b border-gray-100 pb-2">
                            <span>Senin - Kamis</span>
                            <span class="font-bold text-gray-800">08.00 - 15.00 WIB</span>
                        </li>
                        <li class="flex justify-between border-b border-gray-100 pb-2">
                            <span>Jumat</span>
                            <span class="font-bold text-gray-800">08.00 - 10.30 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-400">© 2026 Pemerintah Kabupaten Katingan.</p>
            </div>
        </div>
    </footer>

</body>
</html>