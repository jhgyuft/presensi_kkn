<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Rekap Presensi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form method="GET" action="{{ route('presensi.rekap') }}" class="mb-6 flex items-center gap-3">

                    <label class="font-semibold">
                        Pilih Tanggal
                    </label>

                    
                    <input
                    type="date"
                    name="tanggal"
                    value="{{ $tanggal }}"
                    class="border rounded px-3 py-2">
                    
                    <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    
                    Tampilkan
                    
                </button>

                
            </form>
            
            <div class="mb-4">
                <a href="{{ route('presensi.export.excel', ['tanggal' => $tanggal]) }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Export Excel
                </a>
            </div>
            
            <table class="min-w-full border border-gray-300">
                
                    <thead class="bg-gray-100">

                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">NIM</th>
                            <th class="border px-4 py-2">Prodi</th>
                            <th class="border px-4 py-2">Tanggal</th>
                            <th class="border px-4 py-2">Jam</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($presensis as $index => $presensi)

                        <tr>

                            <td class="border px-4 py-2 text-center">
                                {{ $index + 1 }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $presensi->mahasiswa->nama }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $presensi->mahasiswa->nim }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $presensi->mahasiswa->prodi }}
                            </td>

                            <td class="border px-4 py-2 text-center">
                                {{ $presensi->waktu_presensi->format('d-m-Y') }}
                            </td>

                            <td class="border px-4 py-2 text-center">
                                {{ $presensi->waktu_presensi->format('H:i:s') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-6">
                                Belum ada data presensi.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>