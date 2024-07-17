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

                    <div class="mb-3">
                        <label for="product_id">Nama Product</label>
                        <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                            <option value="">Pilih Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $servicess->product_id == $product->id ? 'selected' : '' }}>{{ $product->nama_product }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Harga Satuan</label>
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
