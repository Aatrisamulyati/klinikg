<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Product;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicess = Services::with('product')->get();
        return view('backend.services.index', compact('servicess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('backend.services.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama_services' => 'required|string|max:255',
        //     'product_ids' => 'required|array',
        //     'product_ids.*' => 'exists:products,id',
        //     'harga' => 'required|numeric',
        // ]);

        // $servicess = new Services();
        // $servicess->nama_services = $validated['nama_services'];
        // $servicess->harga = $validated['harga'];

        // // Menyimpan relasi produk jika diperlukan
        // $servicess->products()->sync($validated['product_ids']);

        // return redirect('data-services')->with('success', 'Data berhasil ditambahkan!');

        
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
        $servicess = Services::findOrFail($id);
        $products = Product::all();

        return view('backend.services.edit', compact('servicess', 'products'));
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
            'nama_services' => 'required',
            'product_id' => 'required|array',
            'harga' => 'required|numeric',
        ]);

        $servicess = Services::findOrFail($id);
        $servicess->update($validated);
        return redirect('data-services')->with('success', 'Data berhasil ditambahkan!');
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

        Services::where('id', $id)->delete();

        return redirect('data-services')->with('success', 'Data berhasil di Hapus!');
    }
}
