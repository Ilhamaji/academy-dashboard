<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();

        return view('pages.penerimaan', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains]);
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
