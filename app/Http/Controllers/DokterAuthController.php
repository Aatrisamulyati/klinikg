<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|unique:dokters',
            'email' => 'required|email|unique:dokters',
            'password' => 'required|confirmed|min=8',
        ]);

        $dokter = Dokter::create([
            'dokter_id' => $request->dokter_id,
            'nama_dokter' => $request->nama_dokter,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'spesialis' => $request->spesialis,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'Dokter created successfully'], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nama_dokter', 'password');

        if (Auth::guard('dokter')->attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(['message' => 'Login successful'], 200);
        }

        throw ValidationException::withMessages([
            'nama_dokter' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('dokter')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
