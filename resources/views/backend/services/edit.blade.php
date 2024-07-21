@extends('backend.layouts.main')

@section('menuDataServices', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-services.update', $servicess->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menambahkan metode PUT untuk formulir edit -->

            <div class="card">
                <div class="card-header">
                    Edit Data Services
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Services</label>
                        <input type="text" name="nama_services"
                            class="form-control @error('nama_services') is-invalid @enderror"
                            value="{{ old('nama_services', $servicess->nama_services) }}">
                        @error('nama_services')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input 
                            class="form-check-input @error('product_ids') is-invalid @enderror" 
                            type="checkbox" 
                            name="product_ids[]" 
                            value="{{ $product->id }}" 
                            id="product_{{ $product->id }}" 
                            @if(in_array($product->id, old('product_ids', $selectedProducts))) checked @endif
                        >
                        <label class="form-check-label" for="product_{{ $product->id }}">
                            {{ $product->nama_product }}
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Harga </label>
                        <input type="text" name="harga"
                            class="form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga', $servicess->harga) }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('data-services.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
