<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Mahasiswa KKN
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Daftar Mahasiswa</h3>

                    <a href="{{ route('mahasiswa.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">NIM</th>
                            <th class="border px-4 py-2">Prodi</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($mahasiswas as $index => $mahasiswa)
                            <tr>
                                <td class="border px-4 py-2 text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $mahasiswa->nama }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $mahasiswa->nim }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $mahasiswa->prodi }}
                                </td>

                                <td class="border px-4 py-2 text-center">

                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                        method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Belum ada data mahasiswa.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>