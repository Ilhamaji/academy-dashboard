<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportJenisPengeluaran implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
       $jenis = DB::table('jenis_pengeluaran')->get();

        return view('components.tabelJenisPengeluaran', ['jenis' => $jenis]);

    }
}

