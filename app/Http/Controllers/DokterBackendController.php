<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dokter.index', [
            'dokters' => Dokter::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dokter.create');
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
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|in:Spesialis Gigi|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        // Create a new dokter with the validated data
        Dokter::create($validated);

        // Redirect to the data-dokter page with a success message
        return redirect('data-dokter')->with('success', 'Data berhasil ditambahkan!');

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
        return view('backend.dokter.edit', [
            'dokters' => Dokter::find($id),
        ]);
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
        $validated = $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        // Find the dokter by ID
        $dokter = Dokter::findOrFail($id);
        $dokter->update($validated);

        // Redirect to the data-product page with a success message
        return redirect('data-dokter')->with('success', 'Data berhasil diperbarui!');
        
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

        Dokter::where('id', $id)->delete();

        return redirect('data-dokter')->with('success', 'Data berhasil di Hapus!');
    }
}
