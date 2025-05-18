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
        $title = 'Laporan Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_pembayaran', 'pembayaran.id_jenis', '=', 'jenis_pembayaran.id')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_pembayaran.jenis')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.laporanPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'title' => $title]);
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

        $siswa = DB::table('siswa')->where('nisn', '=', $request->nisn)->first();

        $request->validate([
            'nisn' => 'required|numeric',
            'kelas' => 'nullable|numeric',
            'jenis' => 'required',
            'nominal' => 'required|numeric',
            'tgl' => 'required|date'
        ]);

        DB::table('pembayaran')->insert([
            [
                'nisn' => $request->nisn,
                'id_jenis' => $request->jenis,
                'nominal' => $request->nominal,
                'tanggal' => $request->tgl
            ],
        ]);

        if ($siswa->kelas === '' || $siswa->kelas === NULL) {
            $siswa->update([
                'kelas' => $request->kelas,
            ]);
        }

        return redirect("/transaksi/pembayaran")->with('success', 'Pembayaran created successfully');
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

    public function cari(Request $request)
    {
        $title = 'Laporan Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        if(!$request->bulan == '' && $request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(6);
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(6);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(6);
        }else{
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->orderBy('tanggal', 'ASC')->paginate(6);
        }

        return view('pages.laporanPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'title' => $title]);
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
