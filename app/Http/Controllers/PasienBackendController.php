<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pasien.index', [
            'pasiens' => Pasien::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pasien.create');
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
            'user_id' =>'required',
            'nama_pasien' => 'required',
            'email' => 'required|email|unique:pasiens',
            'foto_profile' => 'nullable|image',
            'tgl_lahir' => 'nullable|date',
            'phone' => 'nullable|numeric',
            'password' => 'required|min:8|confirmed', // 'password_confirmation' field must be present
            'alamat' => 'nullable|string',
        ]);
            
        $pasienImage = null;
    
        // Check if the image is uploaded
        if ($image = $request->file('foto_profile')) {
            // Define the destination path for the image
            $destinationPath = 'images/pasien/';
            // Create a unique name for the image based on the current date and time
            $pasienImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // Move the image to the destination path
            $image->move($destinationPath, $pasienImage);
        }
    
        // Add the image name to the validated data
        $validated['foto_profile'] = $pasienImage;
        $validated['password'] = bcrypt($request->input('password'));
    
        // Buat data pasien baru dengan data yang divalidasi
        Pasien::create($validated);
    
        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('/data-pasien')->with('success', 'User berhasil ditambahkan!');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('backend.pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.pasien.edit', [
            'pasiens' => Pasien::find($id),
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
        // Validasi data yang dikirim dari formulir
        $validated = $request->validate([
            'name' => 'required',
            'foto_profile' => 'nullable', // Sesuaikan dengan kebutuhan Anda
            'tgl_lahir' => 'nullable|date',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'password' => 'nullable|min:8', 
        ]);

        // Handle file upload (jika ada foto profil)
        // Jika ada file foto_profile di dalam request
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/foto_profile/pasien/', $fileName);
            $validated['foto_profile'] = str_replace('public/', '', $path);
        } else {
            // Jika tidak ada file foto_profile di dalam request, atur nilai default atau sesuai kebutuhan
            $fileName = null; // Atur nilai default sesuai kebutuhan
        }

        // Handle password
        if ($request->filled('password')) {
            // Jika password diisi, hash password menggunakan bcrypt
            $validated['password'] = bcrypt($request->input('password'));
        } else {
            // Jika password tidak diisi, biarkan password tetap seperti sebelumnya
            unset($validated['password']);
        }

        // dd($validated);
        // Update user ke dalam database
        $validated['foto_profile'] = $fileName;
        $pelanggan = User::findOrFail($id);
        $pelanggan->update($validated);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('/data-pasien')->with('success', 'User berhasil diperbarui!');
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

        Pasien::where('id', $id)->delete();

        return redirect('data-pasien')->with('success', 'Data berhasil di Hapus!');
    }
}
