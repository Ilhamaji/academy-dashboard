<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Profil';
        $user = Auth::user();

        return view('pages.profil', ['user' => $user, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

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
        $user = User::find($id);

        if ($request->hasFile('image')) {

            //delete old image
            File::delete(public_path('/').$user->image);

            //upload new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = "images/".$imageName;

            $hashedPassword = Hash::make($request->password);

            //update post with new image
            if ($request->password === $request->password_confirmation) {
                if (Hash::check($request->password, $user->password)) {
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'email' => $request->email,
                        'image' => $imagePath,
                    ]);
                }else {
                    return redirect("/profil")->with('error', 'Password tidak sesuai!');
                }
            }else {
                return redirect("/profil")->with('error', 'Konfirmasi Password tidak sesuai!');
            }
        }else {
            $hashedPassword = Hash::make($request->password);

            //update post without image
            if ($request->password === $request->password_confirmation) {
                if (Hash::check($request->password, $user->password)){
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'email' => $request->email,
                    ]);
                }else {
                    return redirect("/profil")->with('error', 'Password tidak sesuai!');
                }
            }else {
                return redirect("/profil")->with('error', 'Konfirmasi Password tidak sesuai!');
            }
        }

        return redirect("/profil")->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
