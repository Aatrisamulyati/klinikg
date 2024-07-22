@extends('admin.layouts.main')

@section('menuDataBooking', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-booking.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Booking
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nama Pasien:</label>
                            <select id="pasien_id" name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror">
                                @foreach($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                @endforeach
                            </select>
                            @error('pasien_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Nama Dokter:</label>
                            <select id="dokter_id" name="dokter_id" class="form-control @error('dokter_id') is-invalid @enderror">
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                @endforeach
                            </select>
                            @error('dokter_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nama Layanan:</label>
                            <select id="service_id" name="service_id" class="form-control @error('service_id') is-invalid @enderror">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->nama }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Jam:</label>
                            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam') }}">
                            @error('jam')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Status:</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="belum dikonfirmasi">Belum Dikonfirmasi</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-booking.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
