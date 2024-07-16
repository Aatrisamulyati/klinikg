<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
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
            'nama_product' => 'required',
            'gambar' => 'nullable',
            'harga_satuan' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $productImage = null;

        // Check if the image is uploaded
        if ($image = $request->file('gambar')) {
            // Define the destination path for the image
            $destinationPath = 'images/product/';
            // Create a unique name for the image based on the current date and time
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // Move the image to the destination path
            $image->move($destinationPath, $productImage);
        }

        // Add the image name to the validated data
        $validated['gambar'] = $productImage;

        // Remove the debugging line after you're done debugging
        // dd($validated);

        // Create a new product with the validated data
        Product::create($validated);

        // Redirect to the data-product page with a success message
        return redirect('data-product')->with('success', 'Data berhasil ditambahkan!');

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
        return view('backend.product.edit', [
            'products' => Product::find($id),
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
            'nama_product' => 'required',
            'gambar' => 'nullable',
            'harga_satuan' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);
    
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'nama_product' => 'required',
            'gambar' => 'nullable|image',
            'harga_satuan' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        // Initialize the product image variable
        $productImage = $product->gambar;

        // Check if a new image is uploaded
        if ($image = $request->file('gambar')) {
            // Define the destination path for the image
            $destinationPath = 'images/product/';
            // Create a unique name for the image based on the current date and time
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // Move the new image to the destination path
            $image->move($destinationPath, $productImage);

            // Delete the old image if it exists
            if ($product->gambar && file_exists($destinationPath . $product->gambar)) {
                unlink($destinationPath . $product->gambar);
            }
        }

        // Add the image name to the validated data
        $validated['gambar'] = $productImage;

        // Update the product with the validated data
        $product->update($validated);

        // Redirect to the data-product page with a success message
        return redirect('data-product')->with('success', 'Data berhasil diperbarui!');
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

        Product::where('id', $id)->delete();

        return redirect('data-product')->with('success', 'Data berhasil di Hapus!');
    }
}
