<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Surat - Desa Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans text-gray-900">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl">
            
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Form Pengajuan Surat</h2>
                <p class="mt-2 text-sm text-gray-600">Isi data dengan benar untuk mempercepat proses.</p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('layanan.store') }}" method="POST">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input name="nama_pemohon" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                    <input name="nik_pemohon" type="number" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                    <select name="jenis_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                        <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Keperluan / Keterangan</label>
                    <textarea name="keterangan" rows="3" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Untuk persyaratan mendaftar sekolah"></textarea>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('welcome') }}" class="w-1/2 flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" class="w-1/2 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>