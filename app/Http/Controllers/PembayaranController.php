<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $siswa = DB::table('siswa')->where('nisn', '=', $request->nisn)->get();

        $request->validate([
            'nisn' => 'required|numeric',
            'kelas' => 'nullable|numeric',
            'keterangan' => 'required',
            'nominal' => 'required|numeric',
            'tgl' => 'required|date'
        ]);

        DB::table('pembayaran')->insert([
            [
                'nisn' => $request->nisn,
                'keterangan' => $request->keterangan,
                'nominal' => $request->nominal,
                'tanggal' => $request->tgl
            ],
        ]);

        if ($siswa->kelas === '' || $siswa->kelas === NULL) {
            $siswa->update([
                'kelas' => $request->kelas,
            ]);
        }

        return redirect("/penerimaan")->with('success', 'Pembayaran created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran, $id)
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();
        $pembayaran = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.*')->where('id', '=', $id)->orderBy('tanggal', 'ASC')->get();

        return view('pages.kwitansiPembayaran', ['user' => $user, 'pembayaran' => $pembayaran, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
