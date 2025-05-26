<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\ExportSiswa;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Siswa';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('created_at', 'ASC')->paginate(6);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.siswa', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nisn' => 'required|numeric|unique:siswa',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'nullable|numeric',
            'alamat' => 'required',
        ]);

        DB::table('siswa')->insert([
            [
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas' => $request->kelas,
                'alamat' => $request->alamat,
                'created_at' => now(),
            ],
        ]);

        return redirect("/siswa")->with('success', 'Siswa created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa, Request $request)
    {
        //
        $title = 'Siswa';
        $user = Auth::user();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->paginate(6);

        if(!$request->cariKelas == '' && $request->cari == ''){
            $siswas = DB::table('siswa')->where('kelas','=', $request->cariKelas)->paginate(6);
        }elseif(!$request->cariKelas == '' && !$request->cari == ''){
            $siswas = DB::table('siswa')->where('nama_siswa','like',"%".$request->cari."%")->whereIn('kelas', [$request->cariKelas])->paginate(6);
        }else{
            $siswas = DB::table('siswa')
            ->where('nama_siswa','like',"%".$request->cari."%")
            ->paginate(6);
        }

        return view('pages.siswa', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa, $nisn)
    {
        //
        $title = 'Siswa';
        $user = Auth::user();
        $s = DB::table('siswa')->where('nisn', '=', $nisn)->get();

        return view('pages.siswaEdit', ['user' => $user, 's' => $s[0], 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa, $nisn)
    {
        //
        $siswa = DB::table('siswa')->where('nisn', '=', $nisn);

        $request->validate([
            'nisn' => 'required|numeric',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'nullable|numeric',
            'alamat' => 'required',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'updated_at' => now(),
        ]);

        return redirect("/siswa")->with('success', 'Siswa sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa, $nisn)
    {
        //
        $siswa = DB::table('siswa')->where('nisn', '=', $nisn);
        $siswa->delete();

        return redirect("/siswa")->with('success', 'Siswa deleted successfully');
    }

    public function export_siswa(){
        return Excel::download(new ExportSiswa, 'siswa.xlsx');
    }

    public function laporanSiswa(){
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $siswas = DB::table('kelas')->join('siswa', 'kelas.nama_kelas', '=', 'siswa.kelas')->select('kelas.*', 'siswa.*')->paginate(10);
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.laporanSiswa', ['kelass' => $kelass, 'user' => $user, 'siswas' => $siswas, 'title' => $title]);
    }

    public function laporanCari(Request $request){
        $title = 'Laporan Siswa';
        $user = Auth::user();
        $siswas = DB::table('siswa')->orderBy('nama_siswa', 'ASC')->paginate(10);

        if(!$request->cari == ''){
            $siswas = DB::table('siswa')->where('nama_siswa','like',"%".$request->cari."%")->paginate(10);
        }else{
            $siswas = DB::table('siswa')
            ->paginate(10);
        }

        return view('pages.laporanSiswa', ['user' => $user, 'siswas' => $siswas, 'title' => $title]);
    }
}
