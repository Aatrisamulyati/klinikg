<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Http\Controllers;
use Illuminate\Http\Request;

class JadwalBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::with('dokter')->get();
        return view('backend.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokters = Dokter::all();
        return view('backend.jadwal.create', compact('dokters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required', 
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);
        Jadwal::create($validatedData); 
        return redirect('data-jadwal')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal_dokter $jadwal_dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal_dokter $jadwal_dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal_dokter $jadwal_dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal_dokter  $jadwal_dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal_dokter $jadwal_dokter)
    {
        //
    }
}
