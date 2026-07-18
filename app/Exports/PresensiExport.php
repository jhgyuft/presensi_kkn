<?php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresensiExport implements FromCollection, WithHeadings
{
    protected $tanggal;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function collection()
    {
        return Presensi::with('mahasiswa')
            ->whereDate('waktu_presensi', $this->tanggal)
            ->get()
            ->map(function ($presensi) {
                return [
                    $presensi->mahasiswa->nama,
                    $presensi->mahasiswa->nim,
                    $presensi->mahasiswa->prodi,
                    $presensi->waktu_presensi->format('d-m-Y'),
                    $presensi->waktu_presensi->format('H:i:s'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIM',
            'Prodi',
            'Tanggal',
            'Jam Presensi',
        ];
    }
}