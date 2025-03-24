<?php

namespace App\Http\Controllers;

use App\Models\Lainnya;
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
        DB::table('lain_lain')->insert([
            [
                'keterangan' => $request->keterangan,
                'nominal' => $request->nominal,
                'tanggal' => $request->tgl
            ],
        ]);

        return redirect("/penerimaan")->with('success', 'Lainnya created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lainnya $lainnya, $id)
    {
        //
        $user = Auth::user();
        $lains = DB::table('lain_lain')->where('id', '=', $id)->orderBy('tanggal', 'ASC')->get();

        return view('pages.kwitansiLainnya', ['user' => $user, 'lains' => $lains]);
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
