<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            QR Code Presensi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6 text-center">

                <h3 class="text-lg font-bold mb-4">
                    Scan QR Code untuk Presensi
                </h3>

                <div class="flex justify-center mb-6">
                    {!! QrCode::size(250)->generate(route('presensi.form')) !!}
                </div>

                <a href="{{ route('qrcode.download') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Download QR Code
                </a>

            </div>

        </div>
    </div>
</x-app-layout>