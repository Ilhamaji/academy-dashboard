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
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();

        return view('components.tabelLainnya', [
            'lains' => $lains
        ]);
    }
}
