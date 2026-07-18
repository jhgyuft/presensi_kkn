<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Jadwal Presensi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('jadwal.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Nama Kegiatan</label>

                        <input
                            type="text"
                            name="judul"
                            class="w-full border rounded px-3 py-2 mt-1"
                            value="{{ old('judul') }}">

                        @error('judul')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Tanggal</label>

                        <input
                            type="date"
                            name="tanggal"
                            class="w-full border rounded px-3 py-2 mt-1"
                            value="{{ old('tanggal') }}">

                        @error('tanggal')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">

                        <label class="block font-medium">Jam Mulai</label>

                        <input
                            type="time"
                            name="jam_mulai"
                            class="w-full border rounded px-3 py-2 mt-1">

                    </div>

                    <div class="mb-4">

                        <label class="block font-medium">Jam Selesai</label>

                        <input
                            type="time"
                            name="jam_selesai"
                            class="w-full border rounded px-3 py-2 mt-1">

                    </div>

                    <div class="mb-5">

                        <label class="inline-flex items-center">

                            <input
                                type="checkbox"
                                name="aktif"
                                class="rounded">

                            <span class="ml-2">
                                Jadikan Jadwal Aktif
                            </span>

                        </label>

                    </div>

                    <div class="flex gap-2">

                        <button
                            class="bg-blue-600 text-white px-4 py-2 rounded">

                            Simpan

                        </button>

                        <a
                            href="{{ route('jadwal.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>