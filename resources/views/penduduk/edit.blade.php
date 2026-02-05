<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data Penduduk') }}
            </h2>
            <a href="{{ route('penduduk.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-6">
                                <h3 class="text-lg font-bold text-gray-700 border-b pb-2">Identitas Diri</h3>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="number" name="nik" value="{{ old('nik', $penduduk->nik) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" required>
                                    @error('nik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="nama" value="{{ old('nama', $penduduk->nama) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Jenis Kelamin</label>
                                    <div class="flex items-center gap-4 mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="L" {{ (old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' || old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki') ? 'checked' : '' }} class="text-blue-600 border-gray-300 focus:ring-blue-500">
                                            <span class="ml-2 text-gray-700">Laki-laki</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="P" {{ (old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' || old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan') ? 'checked' : '' }} class="text-pink-600 border-gray-300 focus:ring-pink-500">
                                            <span class="ml-2 text-gray-700">Perempuan</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <h3 class="text-lg font-bold text-gray-700 border-b pb-2">Data Tambahan</h3>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Status Perkawinan</label>
                                    <select name="status_perkawinan" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                                        @foreach(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                                            <option value="{{ $status }}" {{ old('status_perkawinan', $penduduk->status_perkawinan) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 mb-1">Alamat Lengkap</label>
                                    <textarea name="alamat" rows="3" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 gap-4">
                            <a href="{{ route('penduduk.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition duration-200">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-600 border border-transparent rounded-lg text-white font-semibold hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>