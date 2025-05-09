<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detail', ['user' => $user, 'kelass' => $kelass, 'title' => $title]);
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
    public function show(Detail $detail, $id)
    {
        //
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->where('kelas.id', '=', $id)->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detailSiswa', ['kelass' => $kelass, 'user' => $user, 'siswas' => $siswas, 'title' => $title, 'id' => $id]);
    }

    public function detail(Detail $detail, $nisn){
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $back = DB::table('siswa')->select('kelas')->where('nisn', '=', $nisn)->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->where('pembayaran.nisn', '=', $nisn)->orderBy('tanggal', 'ASC')->get();

        return view('pages.detailPembayaran', ['title' => $title, 'user' => $user, 'pembayarans' => $pembayarans, 'back' => $back[0]->kelas, 'nisn' => $nisn]);
    }

    public function more(Detail $detail, $id){
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $back = DB::table('pembayaran')->select('nisn')->where('id', '=', $id)->get();
        $backKelas = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('siswa.kelas')->where('id', '=', $id)->get();
        $pembayaran = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.*')->where('id', '=', $id)->orderBy('tanggal', 'ASC')->get();

        return view('pages.detailKwitansi', ['user' => $user, 'pembayaran' => $pembayaran, 'title' => $title, 'back' => $back[0]->nisn, 'backKelas' => $backKelas[0]->kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showCari(Request $request, $id){
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->where('kelas.id', '=', $id)->where('nama_siswa', 'like', '%'.$request->cari.'%')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detailSiswa', ['id' => $id ,'user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'title' => $title]);
    }

    public function detailCari(Request $request, $nisn) {
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $back = DB::table('siswa')->select('kelas')->where('nisn', '=', $nisn)->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->where('pembayaran.nisn', '=', $nisn)->where('tanggal', 'like', '%'.$request->cari.'%')->orderBy('tanggal', 'ASC')->get();

        return view('pages.detailPembayaran', ['title' => $title, 'user' => $user, 'pembayarans' => $pembayarans, 'back' => $back[0]->kelas, 'nisn' => $nisn]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
