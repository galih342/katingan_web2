<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Kependudukan') }}
            </h2>
            <a href="{{ route('penduduk.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Penduduk
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm rounded-r" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="w-full md:w-1/2">
                    <form action="{{ route('penduduk.index') }}" method="GET">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </button>
                            </span>
                            <input type="search" name="search" value="{{ request('search') }}" class="py-2 text-sm text-gray-900 bg-gray-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-200 focus:border-transparent w-full" placeholder="Cari Nama atau NIK..." autocomplete="off">
                        </div>
                    </form>
                </div>
                <div class="text-sm text-gray-500 hidden md:block">
                    Total: <span class="font-bold text-gray-800">{{ $penduduks->total() }}</span> Warga
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama & NIK</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">L/P</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($penduduks as $penduduk)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-lg">
                                                {{ substr($penduduk->nama, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $penduduk->nama }}</div>
                                            <div class="text-xs text-gray-500 tracking-wider">{{ $penduduk->nik }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($penduduk->jenis_kelamin == 'L' || $penduduk->jenis_kelamin == 'Laki-laki')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Laki-laki
                                        </span>
                                    @else
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                            Perempuan
                                        </span>
                                    @endif
                                </td>
                            
                                   
                                
                                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                    {{ $penduduk->alamat }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 p-2 rounded-md hover:bg-yellow-100 transition" title="Edit Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data {{ $penduduk->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-md hover:bg-red-100 transition" title="Hapus Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="bg-gray-100 rounded-full p-4 mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 text-lg font-medium">Data Penduduk Tidak Ditemukan</p>
                                        <p class="text-gray-400 text-sm">Silakan tambahkan data penduduk baru atau cari dengan kata kunci lain.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($penduduks->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $penduduks->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>