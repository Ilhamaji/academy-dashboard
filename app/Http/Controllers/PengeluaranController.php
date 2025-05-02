<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportPengeluaran;
use Maatwebsite\Excel\Facades\Excel;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.pengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title]);
    }

    public function pengeluaran(Request $request)
    {
        //
        $title = 'Laporan Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->orderBy('tanggal', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.laporanPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'jenis' => $request->jenis,
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
    public function show(Pengeluaran $pengeluaran, $id)
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
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.transaksiPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title]);
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
