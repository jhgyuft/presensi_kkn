<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi KKN</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="max-w-md mx-auto mt-16 bg-white shadow-lg rounded-lg p-6">

    <h2 class="text-2xl font-bold text-center mb-6">
        Presensi KKN
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('presensi.store.public') }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold">
            NIM
        </label>

        <input
            type="text"
            name="nim"
            class="w-full border rounded px-3 py-2 mb-4"
            placeholder="Masukkan NIM"
            required
        >

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">

            Presensi

        </button>

    </form>

</div>

</body>
</html>