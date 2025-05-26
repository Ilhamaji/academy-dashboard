<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportKelas;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kelas()
    {
        //
        $title = 'Laporan Kelas';
        $user = Auth::user();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detail', ['user' => $user, 'kelass' => $kelass, 'title' => $title]);
    }

    public function show(Detail $detail, $id)
    {
        //
        $title = 'Laporan Kelas';
        $user = Auth::user();
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->where('kelas.id', '=', $id)->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detailSiswa', ['kelass' => $kelass, 'user' => $user, 'siswas' => $siswas, 'title' => $title, 'id' => $id]);
    }

    public function detail(Detail $detail, $nisn){
        $title = 'Laporan Kelas';
        $user = Auth::user();
        $back = DB::table('siswa')->select('kelas')->where('nisn', '=', $nisn)->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'jenis_penerimaan.kode', '=', 'pembayaran.kode_jenis')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->where('pembayaran.nisn', '=', $nisn)->orderBy('tanggal', 'ASC')->get();

        return view('pages.detailPembayaran', ['title' => $title, 'user' => $user, 'pembayarans' => $pembayarans, 'back' => $back[0]->kelas, 'nisn' => $nisn]);
    }

    public function view_pdf(Detail $detail, $id){
        $informasi = DB::table('informasi')->find(0);

        Carbon::setLocale('id');
        $time = Carbon::now();
        $tahun = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $bulan = Carbon::createFromFormat('Y-m-d H:i:s', $time)->month;
        $b = strlen($bulan) == 1 ? '0'.$bulan : $bulan;
        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $time)->translatedFormat('l d F Y');
        $informasiNama = strtoupper($informasi->nama);

        $pembayaran = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->join('jenis_penerimaan', 'kode_jenis', '=', 'kode')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas', 'jenis_penerimaan.nama as nama_jenis_penerimaan')->find($id);

        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('pdf.css');

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(view('components.pdfKwitansi', ['pembayaran' => $pembayaran, 'informasi' => $informasi, 'tahun' => $tahun, 'b' => $b, 'tanggal' => $tanggal, 'informasiNama' => $informasiNama]), \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->restrictColorSpace = 1;

        $mpdf->Output();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showCari(Request $request, $id){
        $title = 'Laporan Kelas';
        $user = Auth::user();
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->where('kelas.id', '=', $id)->where('nama_siswa', 'like', '%'.$request->cari.'%')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.detailSiswa', ['id' => $id ,'user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'title' => $title]);
    }

    public function detailCari(Request $request, $nisn) {
        $title = 'Laporan Kelas';
        $user = Auth::user();
        $back = DB::table('siswa')->select('kelas')->where('nisn', '=', $nisn)->get();
        $pembayarans = DB::table('pembayaran')->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn')->select('pembayaran.*', 'siswa.nama_siswa', 'siswa.kelas')->where('pembayaran.nisn', '=', $nisn)->where('tanggal', 'like', '%'.$request->cari.'%')->orderBy('tanggal', 'ASC')->get();

        return view('pages.detailPembayaran', ['title' => $title, 'user' => $user, 'pembayarans' => $pembayarans, 'back' => $back[0]->kelas, 'nisn' => $nisn]);
    }

    public function export(){
        return Excel::download(new ExportKelas, 'kelas.xlsx');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
