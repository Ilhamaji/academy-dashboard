<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;

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
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_pembayaran', 'pembayaran.id_jenis', '=', 'jenis_pembayaran.id')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_pembayaran.jenis')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->paginate(10);
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->orderBy('tanggal', 'ASC')->paginate(10);

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
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_pembayaran', 'pembayaran.id_jenis', '=', 'jenis_pembayaran.id')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_pembayaran.jenis')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->paginate(10);
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select('pengeluaran.*', 'jenis_pengeluaran.jenis')->orderBy('tanggal', 'ASC')->where('tanggal', 'like', '%'.$request->cari.'%')->paginate(10);

        $kasPembayaran = DB::table('pembayaran')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');
        $kasLain = DB::table('lain_lain')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');
        $kasPengeluaran = DB::table('pengeluaran')->where('tanggal', 'like', '%'.$request->cari.'%')->sum('nominal');

        return view('pages.kas', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'pengeluarans' => $pengeluarans,'kasPembayaran' => $kasPembayaran, 'kasLain' => $kasLain, 'kasPengeluaran' => $kasPengeluaran]);

    }

    public function view_pdf() {
        $informasi = DB::table('informasi')->find(0);

        Carbon::setLocale('id');
        $time = Carbon::now();
        $tahun = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $bulan = Carbon::createFromFormat('Y-m-d H:i:s', $time)->month;
        $b = strlen($bulan) == 1 ? '0'.$bulan : $bulan;
        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $time)->translatedFormat('l d F Y');
        $informasiNama = strtoupper($informasi->nama);

        $pembayaran = DB::table('pembayaran')->sum('nominal');
        $lain = DB::table('lain_lain')->sum('nominal');
        $pengeluaran = DB::table('pengeluaran')->sum('nominal');
        $total = $pembayaran + $lain - $pengeluaran;

        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('pdf.css');

        $pembayarans= DB::table('pembayaran')
            ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
            ->join('jenis_pembayaran', 'pembayaran.id_jenis', '=', 'jenis_pembayaran.id')
            ->select(
                DB::raw('COUNT(pembayaran.id) as jumlah'),
                DB::raw('SUM(pembayaran.nominal) as nominal'),
                'jenis_pembayaran.jenis'
            )->where('tanggal', 'like', '%'.$tahun.'-'.$b.'%')
            ->groupBy('jenis_pembayaran.jenis')
            ->get();

        $total_pembayarans = DB::table('pembayaran')->where('tanggal', 'like', '%'.$tahun.'-'.$b.'%')
            ->sum('nominal');

        $lains = DB::table('lain_lain')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'))->where('tanggal', 'like', '%'.$tahun.'-'.$b.'%')->get();


        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.id_jenis', '=', 'jenis_pengeluaran.id')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.jenis')->groupBy('jenis_pengeluaran.jenis')->where('tanggal', 'like', '%'.$tahun.'-'.$b.'%')->get();

        $total_pengeluarans = DB::table('pengeluaran')->where('tanggal', 'like', '%'.$tahun.'-'.$b.'%')
            ->sum('nominal');


        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKas', ['pembayarans' => $pembayarans, 'lains' => $lains[0], 'pengeluarans' => $pengeluarans, 'informasi' => $informasi, 'tahun' => $tahun, 'total_pembayarans' => $total_pembayarans, 'total_pengeluarans' => $total_pengeluarans, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama, 'total' => $total]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
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
