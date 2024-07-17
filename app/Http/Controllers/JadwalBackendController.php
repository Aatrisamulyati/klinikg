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
        $validated = $request->validate([
            'dokter_id' => 'required', 
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);
        Jadwal::create($validated); 
        return redirect('data-jadwal')->with('success', 'Data berhasil ditambahkan!');
    }
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
        $jadwal = Jadwal::findOrFail($id);
        $dokters = Dokter::all(); // Assuming you have a Dokter model

        return view('backend.jadwal.edit', compact('jadwal', 'dokters'));
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
        $validate = $request->validate([
            'dokter_id' => 'required', 
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

         // Find the dokter by ID
         $jadwal = Jadwal::findOrFail($id);
         $jadwal->update($validate);
 
         // Redirect to the data-product page with a success message
         return redirect('data-jadwal')->with('success', 'Data berhasil diperbarui!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        if($request->oldPicture) {
            Storage::delete($request->oldPicture);
        }

        Jadwal::where('id', $id)->delete();

        return redirect('data-jadwal')->with('success', 'Data berhasil di Hapus!');
    }
}
