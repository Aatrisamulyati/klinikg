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

                    <div class="row mb-3">
                        <div class="col">
                            <label for="nama_dokter" class="form-label">Nama Dokter:</label>
                            <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                name="nama_dokter" value="{{ old('nama_dokter') }}" required>
                            @error('nama_dokter')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Spesialis</label>
                        <select id="spesialis" name="spesialis" class="form-control">
                            <option value="Spesialis Gigi">Spesialis Gigi</option>
                            <!-- Add more options if needed -->
                        </select>
                        @error('spesialis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_profil" class="form-label">Foto Profil:</label>
                        <input type="file" class="form-control @error('foto_profil') is-invalid @enderror" id="foto_profil"
                            name="foto_profil">
                        @error('foto_profil')
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
