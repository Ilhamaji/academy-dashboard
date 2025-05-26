<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportPembayaran implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $pembayarans = $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->get();

        return view('components.tabelPembayaran', [
            'pembayarans' => $pembayarans
        ]);
    }
}
