<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportLainlain implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
        $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->get();

        return view('components.tabelLainnya', [
            'lains' => $lains
        ]);
    }
}
