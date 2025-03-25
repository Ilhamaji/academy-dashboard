<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Kas';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->get();

        $kasPembayaran = DB::table('pembayaran')->sum('nominal');
        $kasLain = DB::table('lain_lain')->sum('nominal');
        $kasPengeluaran = DB::table('pengeluaran')->sum('nominal');

        return view('pages.kas', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'pengeluarans' => $pengeluarans,'kasPembayaran' => $kasPembayaran, 'kasLain' => $kasLain, 'kasPengeluaran' => $kasPengeluaran]);
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
    public function show(Kas $kas, Request $request)
    {
        //
        $title = 'Kas';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->get();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->get();

        $kasPembayaran = DB::table('pembayaran')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');
        $kasLain = DB::table('lain_lain')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');
        $kasPengeluaran = DB::table('pengeluaran')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');

        return view('pages.kas', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'pengeluarans' => $pengeluarans,'kasPembayaran' => $kasPembayaran, 'kasLain' => $kasLain, 'kasPengeluaran' => $kasPengeluaran]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kas $kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kas $kas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kas $kas)
    {
        //
    }
}
