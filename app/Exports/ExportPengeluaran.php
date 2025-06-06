<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportPengeluaran implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
       $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->get();

        return view('components.tabelPengeluaran', ['pengeluarans' => $pengeluarans]);

    }
}
