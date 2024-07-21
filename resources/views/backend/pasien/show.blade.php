@extends('backend.layouts.main')

@section('menuDataPasien', 'active')

@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h4>Detail Pasien</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <strong>No:</strong>
                </div>
                <div class="col-md-10">
                    {{ $pasien->id }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <strong>Nama Pasien:</strong>
                </div>
                <div class="col-md-10">
                    {{ $pasien->nama }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <strong>Foto:</strong>
                </div>
                <div class="col-md-10">
                    <img src="{{ asset('storage/' . $pasien->foto) }}" alt="Foto Pasien" class="img-thumbnail" style="max-width: 150px;">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <strong>Tanggal Lahir:</strong>
                </div>
                <div class="col-md-10">
                    {{ $pasien->tanggal_lahir }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <strong>Email:</strong>
                </div>
                <div class="col-md-10">
                    {{ $pasien->email }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <strong>Alamat:</strong>
                </div>
                <div class="col-md-10">
                    {{ $pasien->alamat }}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <a href="{{ route('data-pasien.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
