<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Surat Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($dataSurat as $surat)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $surat->created_at->format('d M Y') }}
                                        <div class="text-xs text-gray-400">{{ $surat->created_at->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $surat->nama_pemohon }}</div>
                                        <div class="text-sm text-gray-500">NIK: {{ $surat->nik_pemohon }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 font-bold">{{ $surat->jenis_surat }}</div>
                                        <div class="text-sm text-gray-500 italic">"{{ $surat->keterangan }}"</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($surat->status == 'Pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Menunggu Verifikasi
                                            </span>
                                        @elseif($surat->status == 'Disetujui')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Siap Diambil
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        
                                        @if($surat->status == 'Pending')
                                            <div class="flex justify-center space-x-2">
                                                <form action="{{ route('layanan.update', $surat->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Disetujui">
                                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-xs" title="Setujui Surat">
                                                        ✓ ACC
                                                    </button>
                                                </form>

                                                <form action="{{ route('layanan.update', $surat->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Ditolak">
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs" title="Tolak Surat">
                                                        ✕ Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif($surat->status == 'Disetujui')
                                            <a href="{{ route('layanan.show', $surat->id) }}" target="_blank" class="text-blue-600 hover:text-blue-900 flex items-center justify-center">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                Cetak Surat
                                            </a>
                                        @else
                                            <span class="text-gray-400 cursor-not-allowed">Selesai</span>
                                        @endif

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada pengajuan surat masuk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>