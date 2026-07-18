<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Mahasiswa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $mahasiswa->nama) }}"
                            class="w-full border rounded px-3 py-2 mt-1">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">NIM</label>
                        <input
                            type="text"
                            name="nim"
                            value="{{ old('nim', $mahasiswa->nim) }}"
                            class="w-full border rounded px-3 py-2 mt-1">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Program Studi</label>

                        <select
                            name="prodi"
                            class="w-full border rounded px-3 py-2 mt-1">

                            <option value="Teknik Informatika" {{ $mahasiswa->prodi == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>

                            <option value="Manajemen" {{ $mahasiswa->prodi == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>

                            <option value="PGSD" {{ $mahasiswa->prodi == 'PGSD' ? 'selected' : '' }}>PGSD</option>

                            <option value="PBSI" {{ $mahasiswa->prodi == 'PBSI' ? 'selected' : '' }}>PBSI</option>

                            <option value="Psikologi" {{ $mahasiswa->prodi == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>

                            <option value="Akuntansi" {{ $mahasiswa->prodi == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>

                            <option value="Hukum" {{ $mahasiswa->prodi == 'Hukum' ? 'selected' : '' }}>Hukum</option>

                            <option value="Teknik Industri" {{ $mahasiswa->prodi == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>

                        </select>

                    </div>

                    <div class="flex gap-2">

                        <button
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">

                            Update

                        </button>

                        <a
                            href="{{ route('mahasiswa.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>