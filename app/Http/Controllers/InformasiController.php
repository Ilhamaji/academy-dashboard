<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Informasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Informasi';
        $user = Auth::user();
        $informasi = DB::table('informasi')->find(0);

        return view('pages.informasi', [
            'title' => $title,
            'user' => $user,
            'informasi' => $informasi,
        ]);
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
        $informasi = Informasi::find($id);

        if ($request->hasFile('image')) {

            //delete old image
            if ($informasi->logo != null) {
                File::delete(public_path('/').$informasi->logo);
            }

            //upload new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = "images/".$imageName;

            //update post with new image
            $informasi->update([
                        'nama' => $request->nama,
                        'npsn' => $request->npsn,
                        'nss' => $request->nss,
                        'kodepos' => $request->kodepos,
                        'alamat' => $request->alamat,
                        'no_telp' => $request->no_telp,
                        'email' => $request->email,
                        'website' => $request->website,
                        'logo' => $imagePath,
                        'nip_kepsek' => $request->nip_kepsek,
                        'nama_kepsek' => $request->nama_kepsek,
                    ]);

            return redirect("/informasi")->with('success', 'Informasi Sekolah berhasil diupdate!');
        }else {
            //update post without new image
            $informasi->update([
                'nama' => $request->nama,
                'npsn' => $request->npsn,
                'nss' => $request->nss,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'website' => $request->website,
                'nip_kepsek' => $request->nip_kepsek,
                'nama_kepsek' => $request->nama_kepsek,
            ]);

            return redirect("/informasi")->with('success', 'Informasi Sekolah berhasil diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
