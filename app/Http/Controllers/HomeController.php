<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Home';
        $user = Auth::user();
        $pembayaran = DB::table('pembayaran')->sum('nominal');
        $lain = DB::table('lain_lain')->sum('nominal');
        $pengeluaran = DB::table('pengeluaran')->sum('nominal');
        $siswa = DB::table('siswa')->count();
        $kelas = DB::table('kelas')->count();
        $total = $pembayaran + $lain - $pengeluaran;

        return view('pages.home', ['user' => $user, 'total' => $total, 'siswa' => $siswa, 'kelas' => $kelas, 'title' => $title]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
