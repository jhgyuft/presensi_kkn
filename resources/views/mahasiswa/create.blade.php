<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Mahasiswa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input type="text"
                               name="nama"
                               value="{{ old('nama') }}"
                               class="w-full border rounded px-3 py-2 mt-1">

                        @error('nama')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">NIM</label>
                        <input type="text"
                               name="nim"
                               value="{{ old('nim') }}"
                               class="w-full border rounded px-3 py-2 mt-1">

                        @error('nim')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Program Studi</label>

                        <select name="prodi"
                                class="w-full border rounded px-3 py-2 mt-1">

                            <option value="">-- Pilih Prodi --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="PGSD">PGSD</option>
                            <option value="PBSI">PBSI</option>
                            <option value="Psikologi">Psikologi</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Hukum">Hukum</option>
                            <option value="Teknik Industri">Teknik Industri</option>

                        </select>

                        @error('prodi')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Simpan
                        </button>

                        <a href="{{ route('mahasiswa.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>