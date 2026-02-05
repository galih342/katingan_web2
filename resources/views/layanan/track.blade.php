<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pengajuan - Desa Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('welcome') }}" class="font-bold text-xl text-blue-600">← Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4">
        
        <div class="bg-white p-8 rounded-xl shadow-md mb-8">
            <h1 class="text-2xl font-bold mb-2">Lacak Surat Anda</h1>
            <p class="text-gray-500 mb-6">Masukkan NIK yang Anda gunakan saat pengajuan.</p>

            <form action="{{ route('layanan.track') }}" method="GET" class="flex gap-4">
                <input type="number" name="nik" placeholder="Masukkan NIK..." class="flex-1 border-gray-300 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none" value="{{ request('nik') }}" required>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">Cari</button>
            </form>
        </div>

        @if(request('nik'))
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-lg">Riwayat Pengajuan (NIK: {{ request('nik') }})</h3>
                </div>

                @if(count($riwayat) > 0)
                    <ul>
                        @foreach($riwayat as $surat)
                        <li class="p-6 border-b last:border-0 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-gray-800">{{ $surat->jenis_surat }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">Dibuat: {{ $surat->created_at->format('d M Y, H:i') }}</p>
                                    <p class="text-sm text-gray-600 mt-2 bg-gray-100 p-2 rounded inline-block">"{{ $surat->keterangan }}"</p>
                                </div>
                                <div>
                                    @if($surat->status == 'Pending')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">Sedang Diproses</span>
                                    @elseif($surat->status == 'Disetujui')
                                        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Selesai / Bisa Diambil</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Ditolak</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <div class="p-8 text-center text-gray-500">
                        <p>Belum ada data pengajuan surat untuk NIK tersebut.</p>
                    </div>
                @endif
            </div>
        @endif

    </div>

</body>
</html>