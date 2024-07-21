<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // Validasi data
        $request->validate([
            'dokter_id' => 'required|integer|unique:dokters',
            'nama_dokter' => 'required|string|max:255|unique:dokters',
            'email' => 'required|string|email|max:255|unique:dokters',
            'password' => 'required|string|min:8',
            'spesialis' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $DokterImage = null;

        // Check if the image is uploaded
        if ($image = $request->file('foto_profil')) {
            // Define the destination path for the image
            $destinationPath = 'images/dokter/';
            // Create a unique name for the image based on the current date and time
            $dokterImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // Move the image to the destination path
            $image->move($destinationPath, $dokterImage);
        }

        // Add the image name to the validated data
        //$validated['foto_profil'] = $dokterImage;
        $foto_profil = null;

        Dokter::create([
            'dokter_id' => $request->dokter_id,
            'nama_dokter' => $request->nama_dokter,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'spesialis' => $request->spesialis,
            'phone' => $request->phone,
            'foto_profil' => $foto_profil,
        ]);
    
        dd($request->all());
        // Buat user baru
        /* $user = User::create([
            'name' => ucwords($validatedData['name']),
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        dd($user); */
    
        // Set level user sebagai Dokter
       /*  $user->level = 'Dokter';
        $user->save(); */
    
        // Buat dokter baru terkait dengan user yang baru dibuat
        /* $dokter = Dokter::create([
            'user_id' => $user->id,
            'nama_dokter' => $validatedData['nama_dokter'],
            'spesialis' => $validatedData['spesialis'],
            'phone' => $validatedData['phone'],
        ]);
     */
        // Debugging
        /* if (!$user || !$dokter) {
            return redirect('data-dokter')->with('error', 'Data gagal ditambahkan. Silakan coba lagi.');
        } */
    
        // Redirect ke halaman data-dokter dengan pesan sukses
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
