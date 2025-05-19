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
       $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->orderBy('tanggal', 'ASC')->get();

        return view('components.tabelPengeluaran', ['pengeluarans' => $pengeluarans]);

    }
}
