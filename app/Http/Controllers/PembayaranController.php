<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Carbon\Carbon;
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
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.laporanPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'title' => $title]);
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
            'kode_jenis' => 'required',
            'nominal' => 'required|numeric',
            'tgl' => 'required|date'
        ]);

        DB::table('pembayaran')->insert([
            [
                'nisn' => $request->nisn,
                'kode_jenis' => $request->kode_jenis,
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

    public function transaksi(){
        $title = 'Transaksi Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'kode_jenis', '=', 'kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();
        $jenis = DB::table('jenis_penerimaan')->where('kategori', '=', 'Pembayaran')->get();

        return view('pages.transaksiPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'jenis' => $jenis ]);
    }

    public function edit_transaksi($id){
        $title = 'Transaksi Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'kode_jenis', '=', 'kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->find($id);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->get();
        $jenis = DB::table('jenis_penerimaan')->where('kategori', '=', 'Pembayaran')->get();

        return view('pages.transaksiPembayaranEdit', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'jenis' => $jenis ]);
    }

    public function update_transaksi($id, Request $request){
        $pembayarans = DB::table('pembayaran')->where('id', '=', $id);

         $request->validate([
            'nisn' => 'required|max:11',
            'nominal' => 'required',
            'tgl' => 'required',
            'kode_jenis' => 'required'

        ]);

        $pembayarans->update([
            'nisn' => $request->nisn,
            'nominal' => $request->nominal,
            'tanggal' => $request->tgl,
            'kode_jenis' => $request->kode_jenis,
        ]);

        return redirect('/transaksi/pembayaran')->with('success', 'Berhasil mengubah transaksi pembayaran');
    }

    public function hapus_transaksi($id){
        $pembayaran = DB::table('pembayaran')->where('id', '=', $id);
        $pembayaran->delete();

        return redirect('/transaksi/pembayaran')->with('success', 'Berhasil menghapus pembayaran');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran, $id)
    {
        //
        $title = 'Penerimaan';
        $user = Auth::user();
        $pembayaran = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_pembayaran', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama')->where('id', '=', $id)->orderBy('tanggal', 'ASC')->paginate(10);

        return view('pages.kwitansiPembayaran', ['user' => $user, 'pembayaran' => $pembayaran, 'title' => $title]);
    }

    public function cari(Request $request)
    {
        $title = 'Laporan Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        if(!$request->bulan == '' && $request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }else{
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        }

        return view('pages.laporanPembayaran', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'title' => $title]);
    }
}
