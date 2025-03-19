<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        $siswas = DB::table('siswa')->orderBy('created_at', 'ASC')->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.siswa', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeView(Request $request)
    {
        //
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
            'kelas' => 'required|numeric',
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
        $user = Auth::user();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        if(!$request->cariKelas == '' && $request->cari == ''){
            $siswas = DB::table('siswa')->where('kelas','=', $request->cariKelas)->get();
        }else if(!$request->cariKelas == '' && !$request->cari == ''){
            $siswas = DB::table('siswa')->where('nama_siswa','like',"%".$request->cari."%")->whereIn('kelas', [$request->cariKelas])->get();
        }else{
            $siswas = DB::table('siswa')
            ->where('nama_siswa','like',"%".$request->cari."%")
            ->get();
        }

        return view('pages.siswa', ['user' => $user, 'siswas' => $siswas, 'kelass' => $kelass]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa, $nisn)
    {
        //
        $user = Auth::user();
        $s = DB::table('siswa')->where('nisn', '=', $nisn)->get();

        return view('pages.siswaEdit', ['user' => $user, 's' => $s[0]]);
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
            'kelas' => 'required|numeric',
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
}
