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
        if (Auth::check()) {
            $user = Auth::user();
            $kelass = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();

            return view('pages.kelas', ['user' => $user, 'kelass' => $kelass]);
        }else{
            return view('auth.login');
        }
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
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, $id)
    {
        //
        $kelas = DB::table('kelas')->where('id', '=', $id);
        $kelas->delete();

        return redirect("/kelas")->with('success', 'Siswa deleted successfully');
    }
}
