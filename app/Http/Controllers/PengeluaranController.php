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
        $jenis_pengeluaran = DB::table('jenis_pengeluaran')->orderBy('created_at', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.pengeluaran', ['user' => $user, 'jenis_pengeluaran' => $jenis_pengeluaran, 'kelass' => $kelass, 'title' => $title]);
    }

    public function tambah_jenis_pengeluaran(Request $request)
    {
        //
        $request->validate([
            'kode' => 'required|unique:jenis_pengeluaran',
            'nama' => 'required|max:255',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        DB::table('jenis_pengeluaran')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'updated_at' => $formattedDate,
            'created_at' => $formattedDate,
        ]);

        return redirect('/pengeluaran')->with('success', 'Berhasil menambah jenis pengeluaran');
    }

    public function edit_jenis_pengeluaran($kode, Request $request){
        $title = 'Pengeluaran';
        $user = Auth::user();

        $jenis_pengeluaran = DB::table('jenis_pengeluaran')->where('kode', '=', $kode)->get();

        return view('pages.pengeluaranEdit', ['jenis_pengeluaran' => $jenis_pengeluaran[0], 'title' => $title, 'user' => $user]);
    }

    public function update_jenis_pengeluaran($kode, Request $request){

        $jenis_pengeluaran = DB::table('jenis_pengeluaran')->where('kode', '=', $kode);

         $request->validate([
            'kode' => 'required',
            'nama' => 'required|max:255',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateTimeString();

        $jenis_pengeluaran->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'updated_at' => $formattedDate,
        ]);

        return redirect('/pengeluaran')->with('success', 'Berhasil mengubah jenis pengeluaran');
    }

    public function hapus_jenis_pengeluaran($kode){
        $pembayaran = DB::table('pembayaran')->where('kode_jenis', '=', $kode);
        $pembayaran->delete();
        $jenis_pengeluaran = DB::table('jenis_pengeluaran')->where('kode', '=', $kode);
        $jenis_pengeluaran->delete();

        return redirect('/pengeluaran')->with('success', 'Berhasil menghapus jenis pengeluaran');
    }

    public function pengeluaran(Request $request)
    {
        //
        $title = 'Laporan Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);

        return view('pages.laporanPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'title' => $title]);
    }

    public function cari(Request $request)
    {
        $title = 'Laporan Pengeluaran';
        $user = Auth::user();

        if(!$request->bulan == '' && $request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);

        }elseif($request->bulan == '' && !$request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }else{
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);
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
            'kode_jenis' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'required',
            'tgl' => 'required',
        ]);

        DB::table('pengeluaran')->insert([
            'kode_jenis' => $request->kode_jenis,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tgl,
        ]);

        return redirect('/transaksi/pengeluaran')->with('success', 'Berhasil mencatat pengeluaran');
    }

    /**
     * Display the specified resource.
     */
    public function view_pdf($id){
        $informasi = DB::table('informasi')->find(0);

        Carbon::setLocale('id');
        $time = Carbon::now();
        $tahun = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $bulan = Carbon::createFromFormat('Y-m-d H:i:s', $time)->month;
        $b = strlen($bulan) == 1 ? '0'.$bulan : $bulan;
        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $time)->translatedFormat('l d F Y');
        $informasiNama = strtoupper($informasi->nama);

        $pengeluaran = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->find($id);

        $tgl = date("d-m-Y", strtotime($pengeluaran->tanggal));
        $mpdf = new \Mpdf\Mpdf(['format' => [300 ,150], 'margin_footer' => 0]);
        $mpdf->useFixedNormalLineHeight = false;
        $mpdf->useFixedTextBaseline = false;
        $mpdf->adjustFontDescLineheight = 0;
        $stylesheet = file_get_contents('pdfKwitansi.css');

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKwitansiPengeluaran', ['pengeluaran' => $pengeluaran, 'informasi' => $informasi, 'tahun' => $tahun, 'b' => $b, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama, 'tgl' => $tgl]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
    }

    public function transaksi(){
        $title = 'Transaksi Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'jenis_pengeluaran.kode', '=', 'pengeluaran.kode_jenis')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $jenis = DB::table('jenis_pengeluaran')->orderBy('nama')->get();


        return view('pages.transaksiPengeluaran', ['user' => $user, 'pengeluarans' => $pengeluarans, 'kelass' => $kelass, 'title' => $title, 'jenis' => $jenis]);
    }

    public function edit_transaksi($id){
        $title = 'Transaksi Pengeluaran';
        $user = Auth::user();
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->find($id);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $jenis = DB::table('jenis_pengeluaran')->get();

        return view('pages.transaksiPengeluaranEdit', ['user' => $user, 'kelass' => $kelass, 'pengeluarans' => $pengeluarans, 'title' => $title, 'jenis' => $jenis ]);
    }

    public function update_transaksi($id, Request $request){
        $pengeluarans = DB::table('pengeluaran')->where('id', '=', $id);

         $request->validate([
            'nominal' => 'required',
            'tgl' => 'required',
            'keterangan' => 'required',
            'kode_jenis' => 'required'

        ]);

        $pengeluarans->update([
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tgl,
            'kode_jenis' => $request->kode_jenis,
        ]);

        return redirect('/transaksi/pengeluaran')->with('success', 'Berhasil mengubah transaksi pengeluaran');
    }

    public function hapus_transaksi($id){
        $pengeluarans = DB::table('pengeluaran')->where('id', '=', $id);
        $pengeluarans->delete();

        return redirect('/transaksi/pengeluaran')->with('success', 'Berhasil menghapus pengeluaran');
    }
}
