<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Exports\PresensiExport;
use Maatwebsite\Excel\Facades\Excel;

class PresensiController extends Controller
{
    /**
     * Halaman QR Code
     */
    public function qrcode()
    {
        return view('presensi.qrcode');
    }

    /**
     * Download QR Code
     */
    public function downloadQr()
    {
        $qr = QrCode::format('svg')
            ->size(500)
            ->generate(route('presensi.form'));

        return response($qr)
            ->header('Content-Type', 'image/svg+xml')
            ->header(
                'Content-Disposition',
                'attachment; filename="QR-Presensi-KKN.svg"'
            );
    }

    /**
     * Halaman Form Presensi
     */
    public function form()
    {
        return view('presensi.form');
    }

    /**
     * Simpan Presensi
     */
    public function storePresensi(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa) {
            return back()->withErrors([
                'nim' => 'NIM tidak terdaftar.'
            ]);
        }

        // Cek apakah sudah presensi hari ini
        $cek = Presensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('waktu_presensi', today())
            ->exists();

        if ($cek) {
            return back()->withErrors([
                'nim' => 'Anda sudah melakukan presensi hari ini.'
            ]);
        }

        // Simpan presensi
        Presensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'waktu_presensi' => now(),
        ]);

        return redirect()->route('presensi.success');
    }

    /**
     * Rekap Presensi
     */
    public function rekap(Request $request)
    {
        $tanggal = $request->tanggal ?? now()->toDateString();

        $presensis = Presensi::with('mahasiswa')
            ->whereDate('waktu_presensi', $tanggal)
            ->orderBy('waktu_presensi')
            ->get();

        return view('presensi.rekap', compact('presensis', 'tanggal'));
    }
    /**
     * Export Rekap Presensi ke Excel
     */
    public function exportExcel(Request $request)
    {
        $tanggal = $request->tanggal ?? now()->toDateString();

        return Excel::download(
            new PresensiExport($tanggal),
            'Rekap_Presensi_'.$tanggal.'.xlsx'
        );
    }
}