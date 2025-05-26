<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Kelas';
        $user = Auth::user();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->paginate(6);

        return view('pages.kelas', ['user' => $user, 'kelass' => $kelass, 'title' => $title]);
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
        $request->validate([
            'nama_kelas' => 'required|numeric|unique:kelas',
            'wali_kelas' => 'required|max:60',
        ]);

        DB::table('kelas')->insert([
            [
                'nama_kelas' => $request->nama_kelas,
                'wali_kelas' => $request->wali_kelas,
            ],
        ]);

        return redirect("/kelas")->with('success', 'Kelas created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas, $id)
    {
        //
        $title = 'Kelas';
        $user = Auth::user();
        $s = DB::table('kelas')->where('id', '=', $id)->get();
        $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

        return view('pages.kelasEdit', ['user' => $user, 's' => $s[0], 'kelass' => $kelass, 'title' => $title, 'back' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas, $nama_kelas)
    {
        //
        $kelas = DB::table('kelas')->where('nama_kelas', '=', $nama_kelas);

        $request->validate([
            'nama_kelas' => 'required|numeric',
            'wali_kelas' => 'required|max:60',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return redirect("/kelas")->with('success', 'Kelas sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, $nama_kelas)
    {
        //
        $siswa = DB::table('siswa')->where('siswa.kelas', '=', $nama_kelas);
        $siswa->delete();
        $kelas = DB::table('kelas')->where('nama_kelas', '=', $nama_kelas);
        $kelas->delete();

        return redirect("/kelas")->with('success', 'Siswa deleted successfully');
    }
}
