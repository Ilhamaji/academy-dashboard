<?php

namespace App\Http\Controllers;

use App\Models\Lainnya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Laporan Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);

        return view('pages.laporanLainnya', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'lains' => $lains, 'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('lain_lain')->insert([
            [
                'kode_jenis' => $request->kode_jenis,
                'nominal' => $request->nominal,
                'tanggal' => $request->tgl
            ],
        ]);

        return redirect("/transaksi/lain-lain")->with('success', 'Lainnya created successfully');
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

        $lain = DB::table('lain_lain')->join('jenis_penerimaan', 'lain_lain.kode_jenis', '=', 'jenis_penerimaan.kode')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->find($id);

        $tgl = date("d-m-Y", strtotime($lain->tanggal));
        $mpdf = new \Mpdf\Mpdf(['format' => [300 ,150], 'margin_footer' => 0]);
        $mpdf->useFixedNormalLineHeight = false;
        $mpdf->useFixedTextBaseline = false;
        $mpdf->adjustFontDescLineheight = 0;
        $stylesheet = file_get_contents('pdfKwitansi.css');

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKwitansiLainnya', ['lain' => $lain, 'informasi' => $informasi, 'tahun' => $tahun, 'b' => $b, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama, 'tgl' => $tgl]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
    }

    public function transaksi(){
        $title = 'Transaksi Penerimaan';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->paginate(10);
        $jenis = DB::table('jenis_penerimaan')->where('kategori', '=', 'Lain-lain')->orderBy('nama')->get();

        return view('pages.transaksiLainnya', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'lains' => $lains, 'title' => $title, 'jenis' => $jenis]);
    }

    public function edit_transaksi($id){
        $title = 'Transaksi Penerimaan';
        $user = Auth::user();
        $lains = DB::table('lain_lain')->find($id);
        $jenis = DB::table('jenis_penerimaan')->where('kategori', '=', 'Lain-lain')->get();

        return view('pages.transaksiLainnyaEdit', ['user' => $user,'lains' => $lains, 'title' => $title, 'jenis' => $jenis ]);
    }

    public function update_transaksi($id, Request $request){
        $lains = DB::table('lain_lain')->where('id', '=', $id);

         $request->validate([
            'nominal' => 'required',
            'tgl' => 'required',
            'kode_jenis' => 'required'

        ]);

        $lains->update([
            'nominal' => $request->nominal,
            'tanggal' => $request->tgl,
            'kode_jenis' => $request->kode_jenis,
        ]);

        return redirect('/transaksi/lain-lain')->with('success', 'Berhasil mengubah transaksi lain-lain');
    }

    public function hapus_transaksi($id){
        $lains = DB::table('lain_lain')->where('id', '=', $id);
        $lains->delete();

        return redirect('/transaksi/lain-lain')->with('success', 'Berhasil menghapus lain-lain');
    }

    public function cari(Request $request)
    {
        $title = 'Laporan Penerimaan';
        $user = Auth::user();

        if(!$request->bulan == '' && $request->tahun == ''){
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }else{
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        }

        return view('pages.laporanLainnya', ['lains' => $lains, 'user' => $user, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lainnya $lainnya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lainnya $lainnya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lainnya $lainnya)
    {
        //
    }
}
