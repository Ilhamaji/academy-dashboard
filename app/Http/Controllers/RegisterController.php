<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //
        $user = DB::table('users')
                ->where('email','=', $request->email)
                ->get();

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'password' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = "images/".$imageName;

        $hashedPassword = Hash::make($request->password);
        DB::table('users')->insert([
            [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'image' => $imagePath,
                'password' => $hashedPassword,
                'created_at' => now(),
            ],
        ]);

        return redirect("/register")->with('success', 'User created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */

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
