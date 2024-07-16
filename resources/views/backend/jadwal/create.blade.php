@extends('backend.layouts.main')

@section('menuDataJadwal', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-jadwal.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Jadwal Dokter
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{ route('data-jadwal.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="dokter_id">Nama Dokter</label>
                                <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id" name="dokter_id" required>
                                    <option value="">Pilih Dokter</option>
                                    @foreach($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
                                    @endforeach
                                </select>
                                @error('dokter_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
           

                    <div class="mb-3">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari') }}" required>
                        @error('hari')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                        @error('jam_mulai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                        @error('jam_selesai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-jadwal.index') }}" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
