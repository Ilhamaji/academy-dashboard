<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportPengeluaran;
use App\Exports\ExportJenisPengeluaran;
use Maatwebsite\Excel\Facades\Excel;
use \Carbon\Carbon;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function jenis_pengeluaran()
    {
        //
        $title = 'Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.pengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title]);
    }

    public function tambah_jenis_pengeluaran(Request $request)
    {
        //
        $request->validate([
            'jenis' => 'required',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        DB::table('jenis_pengeluaran')->insert([
            'jenis' => $request->jenis,
            'updated_at' => $formattedDate,
        ]);

        return redirect('/pengeluaran')->with('success', 'Berhasil menambah jenis pengeluaran');
    }

    public function pengeluaran(Request $request)
    {
        //
        $title = 'Laporan Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.laporanPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title]);
    }

    public function cari(Request $request)
    {
        $title = 'Laporan Pengeluaran';
        $user = Auth::user();

        if(!$request->bulan == '' && $request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }else{
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->orderBy('tanggal', 'ASC')->paginate(10);
        }

        return view('pages.laporanPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'title' => $title]);
    }

    public function laporan_jenis_pengeluaran(Request $request)
    {
        //
        $title = 'Laporan Jenis Pengeluaran';
        $user = Auth::user();
        $jenis = DB::table('jenis_pengeluaran')->paginate(10);

        return view('pages.jenisPengeluaran', ['user' => $user, 'title' => $title, 'jenis' => $jenis]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function export_jenis_pengeluaran()
    {
        return Excel::download(new ExportJenisPengeluaran, 'jenis-pengeluaran.xlsx');
    }

    public function export()
    {
        return Excel::download(new ExportPengeluaran, 'pengeluaran.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required|numeric',
            'tgl' => 'required',
        ]);

        DB::table('pengeluaran')->insert([
            'id_jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
            'tanggal' => $request->tgl,
        ]);

        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->get();

        return redirect('/transaksi/pengeluaran')->with('success', 'Berhasil mencatat pengeluaran');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $title = 'Pengeluaran';
        $user = Auth::user();
        $pengeluaran = DB::table('pengeluaran')->where('id', '=', $id)->get();

        return view('pages.kwitansiPengeluaran', ['user' => $user, 'pengeluaran' => $pengeluaran, 'title' => $title]);
    }

    public function transaksi(){
        $title = 'Transaksi Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->get();
        $jenis = DB::table('jenis_pengeluaran')->orderBy('jenis', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();


        return view('pages.transaksiPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title, 'jenis' => $jenis]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
    }
}
