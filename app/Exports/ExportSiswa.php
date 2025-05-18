<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ExportSiswa implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->get();
        return view('components.tabelSiswa', ['siswas' => $siswas]);

    }
}
