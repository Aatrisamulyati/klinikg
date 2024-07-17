@extends('backend.layouts.main')

@section('menuDataServices', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Services
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{ route('data-services.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                    <label for="nama_services">Nama Services</label>
                                    <input type="text" class="form-control @error('nama_services') is-invalid @enderror" id="nama_services" name="nama_services" value="{{ old('nama_services') }}" required>
                                    @error('nama_services')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="product_id">Nama Product</label>
                                    <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                                        <option value="">Pilih product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->nama_product }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <input type="text" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ @old('harga') }}">
                                    @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-product.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection