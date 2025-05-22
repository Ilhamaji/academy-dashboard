<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportPembayaran;
use App\Exports\ExportLainlain;
use App\Exports\ExportJenisPenerimaan;
use Maatwebsite\Excel\Facades\Excel;
use \Carbon\Carbon;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tambah_jenis_penerimaan(Request $request){
        $request->validate([
            'jenis' => 'required',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        DB::table('jenis_pembayaran')->insert([
            [
                'jenis' => $request->jenis,
                'updated_at' => $formattedDate,
            ],
        ]);

        return redirect('/pembayaran')->with('success', 'Berhasil menambah jenis pembayaran');
    }

    public function jenis_penerimaan()
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();

        return view('pages.pembayaran', ['user' => $user, 'title' => $title]);
    }


    public function laporan_jenis_penerimaan(Request $request){
        $title = 'Laporan Jenis Penerimaan';
        $user = Auth::user();
        $jenis = DB::table('jenis_pembayaran')->paginate(10);

        return view('pages.jenisPenerimaan', ['user' => $user, 'title' => $title, 'jenis' => $jenis]);
    }

    public function export_jenis_penerimaan(){
        return Excel::download(new ExportJenisPenerimaan, 'jenis-penerimaan.xlsx');
    }

    public function export_pembayaran(){
        return Excel::download(new ExportPembayaran, 'penerimaan-pembayaran.xlsx');
    }

    public function export_lainlain(){
        return Excel::download(new ExportLainlain, 'penerimaan-lainlain.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerimaan $penerimaan)
    {
        //
    }
}
