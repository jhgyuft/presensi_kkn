<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jadwal Presensi
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
                    <h3 class="text-lg font-bold">Daftar Jadwal Presensi</h3>

                    <a href="{{ route('jadwal.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Tambah Jadwal
                    </a>
                </div>

                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Kegiatan</th>
                            <th class="border px-4 py-2">Tanggal</th>
                            <th class="border px-4 py-2">Jam</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($jadwals as $index => $jadwal)

                            <tr>

                                <td class="border px-4 py-2 text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $jadwal->judul }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                </td>

                                <td class="border px-4 py-2 text-center">

                                    @if($jadwal->aktif)

                                        <span class="text-green-600 font-bold">
                                            Aktif
                                        </span>

                                    @else

                                        <span class="text-red-600 font-bold">
                                            Tidak Aktif
                                        </span>

                                    @endif

                                </td>

                                <td class="border px-4 py-2 text-center">

                                    <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">

                                        Edit

                                    </a>

                                    <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                                        method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus jadwal?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    Belum ada jadwal presensi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>