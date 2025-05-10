<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportPembayaran;
use App\Exports\ExportLainlain;
use Maatwebsite\Excel\Facades\Excel;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pembayaran()
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->paginate(6);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.pembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'title' => $title]);
    }

    public function lainnya()
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->paginate(6);

        return view('pages.lainnya', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'lains' => $lains, 'title' => $title]);
    }

    public function transaksi(){
        $title = 'Transaksi Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();

        return view('pages.transaksiPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title]);
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
