<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportKelas implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('components.tabelKelas', ['kelass' => $kelass]);
    }
}
