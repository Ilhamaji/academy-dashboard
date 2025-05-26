<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportJenisPenerimaan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        //
        $jenis = DB::table('jenis_penerimaan')->get();

        return view('components.tabelJenisPenerimaan', ['jenis' => $jenis]);
    }
}
