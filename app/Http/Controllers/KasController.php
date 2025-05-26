<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
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
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
        $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);

        $kasPembayaran = DB::table('pembayaran')->sum('nominal');
        $kasLain = DB::table('lain_lain')->sum('nominal');
        $kasPengeluaran = DB::table('pengeluaran')->sum('nominal');

        return view('pages.kas', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'pengeluarans' => $pengeluarans,'kasPembayaran' => $kasPembayaran, 'kasLain' => $kasLain, 'kasPengeluaran' => $kasPengeluaran]);
    }

    public function show(Kas $kas, Request $request)
    {
        //
        $title = 'Kas';
        $user = Auth::user();

        if(!$request->bulan == '' && $request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
             $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
             $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->orderBy('tanggal', 'ASC')->paginate(10);
        }else{
            $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->orderBy('tanggal', 'ASC')->paginate(10);
            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select('lain_lain.*', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->paginate(10);
            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select('pengeluaran.*', 'jenis_pengeluaran.nama as nama_jenis_pengeluaran')->orderBy('tanggal', 'ASC')->paginate(10);
        }

        return view('pages.kas', ['user' => $user, 'pembayarans' => $pembayarans, 'lains' => $lains, 'title' => $title, 'pengeluarans' => $pengeluarans, 'tahun' => $request->tahun, 'bulan' => $request->bulan]);
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

        $total_pembayarans = DB::table('pembayaran')->sum('nominal');
        $total_pengeluarans = DB::table('pengeluaran')->sum('nominal');
        $total_lains = DB::table('lain_lain')->sum('nominal');
        $total = $total_pembayarans + $total_lains - $total_pengeluarans;

        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('pdf.css');

        $pembayarans= DB::table('pembayaran')
            ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
            ->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')
            ->select(
                DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                DB::raw('SUM(pembayaran.nominal) as nominal'),
                'jenis_penerimaan.nama as nama_jenis_penerimaan',
                'jenis_penerimaan.kode as kode_jenis_penerimaan'
            )
            ->groupBy('pembayaran.kode_jenis')
            ->get();

        $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'), 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->groupBy('lain_lain.kode_jenis')->get();

        $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->groupBy('pengeluaran.kode_jenis')->get();

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKas', ['pembayarans' => $pembayarans, 'lains' => $lains, 'pengeluarans' => $pengeluarans, 'informasi' => $informasi, 'tahun' => $tahun, 'total_pembayarans' => $total_pembayarans, 'total_pengeluarans' => $total_pengeluarans,'total_lains' => $total_lains, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama, 'total' => $total]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
    }

    public function view_pdf_detail(Request $request) {
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('pdf.css');
        $informasi = DB::table('informasi')->find(0);
        Carbon::setLocale('id');
        $time = Carbon::now();
        $tahun = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $bulan = Carbon::createFromFormat('Y-m-d H:i:s', $time)->month;
        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $time)->translatedFormat('l d F Y');
        $informasiNama = strtoupper($informasi->nama);

        if(!$request->bulan == '' && $request->tahun == ''){
            $bulan = strlen($request->bulan) == 1 ? '0'.$request->bulan : $request->bulan;
            $bulanObj   = DateTime::createFromFormat('!m', $bulan);
            $b = $bulanObj->format('F'); //

            switch ($b) {
                case 'January':
                    $b = 'Januari';
                    break;
                case 'February':
                    $b = 'Februari';
                    break;
                case 'March':
                    $b = 'Maret';
                    break;
                case 'April':
                    $b = 'April';
                    break;
                case 'May':
                    $b = 'Mei';
                    break;
                case 'June':
                    $b = 'Juni';
                    break;
                case 'July':
                    $b = 'Juli';
                    break;
                case 'August':
                    $b = 'Agustus';
                    break;
                case 'September':
                    $b = 'September';
                    break;
                case 'October':
                    $b = 'Oktober';
                    break;
                case 'November':
                    $b = 'November';
                    break;
                case 'December':
                    $b = 'Desember';
                    break;
            }

            $keterangan = 'Bulan '.$b;

            $total_pembayarans = DB::table('pembayaran')->whereMonth('tanggal', '=', $request->bulan)->sum('nominal');
            $total_pengeluarans = DB::table('pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->sum('nominal');
            $total_lains = DB::table('lain_lain')->whereMonth('tanggal', '=', $request->bulan)->sum('nominal');
            $total = $total_pembayarans + $total_lains - $total_pengeluarans;


            $pembayarans= DB::table('pembayaran')
                ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
                ->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')
                ->select(
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('SUM(pembayaran.nominal) as nominal'),
                    'jenis_penerimaan.nama as nama_jenis_penerimaan',
                    'jenis_penerimaan.kode as kode_jenis_penerimaan'
                )->whereMonth('tanggal', '=', $request->bulan)
                ->groupBy('pembayaran.kode_jenis')
                ->get();

            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'), 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->groupBy('lain_lain.kode_jenis')->get();

            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->groupBy('pengeluaran.kode_jenis')->get();
        }elseif($request->bulan == '' && !$request->tahun == ''){
            $tahun = $request->tahun;
            $keterangan = 'Tahun '.$tahun;

            $total_pembayarans = DB::table('pembayaran')->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total_pengeluarans = DB::table('pengeluaran')->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total_lains = DB::table('lain_lain')->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total = $total_pembayarans + $total_lains - $total_pengeluarans;


            $pembayarans= DB::table('pembayaran')
                ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
                ->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')
                ->select(
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('SUM(pembayaran.nominal) as nominal'),
                    'jenis_penerimaan.nama as nama_jenis_penerimaan',
                    'jenis_penerimaan.kode as kode_jenis_penerimaan'
                )->whereYear('tanggal', '=', $request->tahun)
                ->groupBy('pembayaran.kode_jenis')
                ->get();

            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'), 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->whereYear('tanggal', '=', $request->tahun)->groupBy('lain_lain.kode_jenis')->get();

            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->whereYear('tanggal', '=', $request->tahun)->groupBy('pengeluaran.kode_jenis')->get();
        }elseif(!$request->bulan == '' && !$request->tahun == ''){
            $bulan = strlen($request->bulan) == 1 ? '0'.$request->bulan : $request->bulan;
            $bulanObj   = DateTime::createFromFormat('!m', $bulan);
            $b = $bulanObj->format('F'); // March
            $tahun = $request->tahun;

            switch ($b) {
                case 'January':
                    $b = 'Januari';
                    break;
                case 'February':
                    $b = 'Februari';
                    break;
                case 'March':
                    $b = 'Maret';
                    break;
                case 'April':
                    $b = 'April';
                    break;
                case 'May':
                    $b = 'Mei';
                    break;
                case 'June':
                    $b = 'Juni';
                    break;
                case 'July':
                    $b = 'Juli';
                    break;
                case 'August':
                    $b = 'Agustus';
                    break;
                case 'September':
                    $b = 'September';
                    break;
                case 'October':
                    $b = 'Oktober';
                    break;
                case 'November':
                    $b = 'November';
                    break;
                case 'December':
                    $b = 'Desember';
                    break;
            }

            $keterangan = 'Bulan '.$b.' Tahun '.$tahun;

            $total_pembayarans = DB::table('pembayaran')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total_pengeluarans = DB::table('pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total_lains = DB::table('lain_lain')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->sum('nominal');
            $total = $total_pembayarans + $total_lains - $total_pengeluarans;


            $pembayarans= DB::table('pembayaran')
                ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
                ->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')
                ->select(
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('SUM(pembayaran.nominal) as nominal'),
                    'jenis_penerimaan.nama as nama_jenis_penerimaan',
                    'jenis_penerimaan.kode as kode_jenis_penerimaan'
                )->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)
                ->groupBy('pembayaran.kode_jenis')
                ->get();

            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'), 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->groupBy('lain_lain.kode_jenis')->get();

            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->whereMonth('tanggal', '=', $request->bulan)->whereYear('tanggal', '=', $request->tahun)->groupBy('pengeluaran.kode_jenis')->get();
        }
        else{
            $total_pembayarans = DB::table('pembayaran')->sum('nominal');
            $total_pengeluarans = DB::table('pengeluaran')->sum('nominal');
            $total_lains = DB::table('lain_lain')->sum('nominal');
            $total = $total_pembayarans + $total_lains - $total_pengeluarans;

            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents('pdf.css');

            $pembayarans= DB::table('pembayaran')
                ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')
                ->join('jenis_penerimaan', 'pembayaran.kode_jenis', '=', 'jenis_penerimaan.kode')
                ->select(
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('COUNT(jenis_penerimaan.kode) as jumlah'),
                    DB::raw('SUM(pembayaran.nominal) as nominal'),
                    'jenis_penerimaan.nama as nama_jenis_penerimaan',
                    'jenis_penerimaan.kode as kode_jenis_penerimaan'
                )
                ->groupBy('pembayaran.kode_jenis')
                ->get();

            $lains = DB::table('lain_lain')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'lain_lain.kode_jenis')->select(DB::raw('COUNT(id) as jumlah'), DB::raw('SUM(nominal) as nominal'), 'jenis_penerimaan.nama as nama_jenis_penerimaan', 'jenis_penerimaan.kode as kode_jenis_penerimaan')->groupBy('lain_lain.kode_jenis')->get();

            $pengeluarans = DB::table('pengeluaran')->join('jenis_pengeluaran', 'pengeluaran.kode_jenis', '=', 'jenis_pengeluaran.kode')->select(DB::raw('COUNT(pengeluaran.id) as jumlah'),DB::raw('SUM(pengeluaran.nominal) as nominal'), 'jenis_pengeluaran.nama as nama_jenis_pengeluaran', 'jenis_pengeluaran.kode as kode_jenis_pengeluaran')->groupBy('pengeluaran.kode_jenis')->get();
        }

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKasDetail', ['pembayarans' => $pembayarans, 'lains' => $lains, 'pengeluarans' => $pengeluarans, 'informasi' => $informasi, 'total_pembayarans' => $total_pembayarans, 'total_pengeluarans' => $total_pengeluarans,'total_lains' => $total_lains, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama, 'total' => $total, 'keterangan' => $keterangan]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
    }
}
