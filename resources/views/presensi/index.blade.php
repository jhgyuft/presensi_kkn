<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Generate QR Code Presensi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Kegiatan</th>
                            <th class="border px-4 py-2">Tanggal</th>
                            <th class="border px-4 py-2">Jam</th>
                            <th class="border px-4 py-2">QR Code</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($jadwals as $jadwal)

                        <tr>

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

                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(180)->generate(route('presensi.form', $jadwal->id)) !!}

                                <div class="mt-3">
                                    <a href="{{ route('presensi.downloadQr', $jadwal->id) }}"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                        Download QR
                                    </a>
                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>