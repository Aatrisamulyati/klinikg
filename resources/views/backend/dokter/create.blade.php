@extends('backend.layouts.main')

@section('menuDataDokter', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-dokter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Dokter
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama dokter</label>
                        <input type="text" name="nama_dokter"
                            class="form-control @error('nama_dokter') is-invalid @enderror"
                            value="{{ @old('nama_dokter') }}">
                        @error('nama_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Spesialis</label>
                        <select id="spesialis" name="spesialis" class="form-control">
                            <option value="Spesialis Gigi">Spesialis Gigi</option>
                        </select>
                        @error('spesialis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ @old('phone') }}">
                        @error('phone')
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
                    <a href="{{ route('data-dokter.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection