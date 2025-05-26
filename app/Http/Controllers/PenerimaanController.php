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
            'kode' => 'required|unique:jenis_penerimaan',
            'nama' => 'required|max:255',
            'kategori' => 'required|max:11',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        DB::table('jenis_penerimaan')->insert([
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'updated_at' => $formattedDate,
                'created_at' => $formattedDate,
            ],
        ]);

        return redirect('/penerimaan')->with('success', 'Berhasil menambah jenis pembayaran');
    }

    public function edit_jenis_penerimaan($kode, Request $request){
        $title = 'Penerimaan';
        $user = Auth::user();

        $jenis_penerimaan = DB::table('jenis_penerimaan')->where('kode', '=', $kode)->get();

        return view('pages.penerimaanEdit', ['jenis_penerimaan' => $jenis_penerimaan[0], 'title' => $title, 'user' => $user]);
    }

    public function update_jenis_penerimaan($kode, Request $request){

        $jenis_penerimaan = DB::table('jenis_penerimaan')->where('kode', '=', $kode);

         $request->validate([
            'kode' => 'required',
            'nama' => 'required|max:255',
            'kategori' => 'required|max:11',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        $jenis_penerimaan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'updated_at' => $formattedDate,
        ]);

        return redirect('/penerimaan')->with('success', 'Berhasil mengubah jenis penerimaan');
    }

    public function hapus_jenis_penerimaan($kode){
        $jenis_pembayaran = DB::table('pembayaran')->where('kode_jenis', '=', $kode);
        $jenis_pembayaran->delete();
        $jenis_lain = DB::table('lain_lain')->where('kode_jenis', '=', $kode);
        $jenis_lain->delete();
        $jenis_penerimaan = DB::table('jenis_penerimaan')->where('kode', '=', $kode);
        $jenis_penerimaan->delete();

        return redirect('/penerimaan')->with('success', 'Berhasil menghapus jenis penerimaan');
    }

    public function jenis_penerimaan()
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();
        $jenis_penerimaan = DB::table('jenis_penerimaan')->orderBy('created_at', 'ASC')->get();

        return view('pages.penerimaan', ['user' => $user, 'title' => $title, 'jenis_penerimaan' => $jenis_penerimaan]);
    }


    public function laporan_jenis_penerimaan(Request $request){
        $title = 'Laporan Jenis Penerimaan';
        $user = Auth::user();
        $jenis = DB::table('jenis_penerimaan')->paginate(10);

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
}
