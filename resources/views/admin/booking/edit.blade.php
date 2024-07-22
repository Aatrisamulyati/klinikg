@extends('admin.layouts.main')

@section('menuDataBooking', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Edit Data Booking
            </div>
            <div class="card-body">
                <form action="{{ route('data-booking.update', $booking->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="pelanggan_id">Nama Pasien</label>
                        <select class="form-control" id="pelanggan_id" name="pelanggan_id">
                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}" {{ $booking->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter_id">Nama Dokter</label>
                        <select class="form-control" id="dokter_id" name="dokter_id">
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}" {{ $booking->dokter_id == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">Nama Layanan</label>
                        <select class="form-control" id="service_id" name="service_id">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>{{ $service->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $booking->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="time" class="form-control" id="jam" name="jam" value="{{ $booking->jam }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="belum dikonfirmasi" {{ $booking->status == 'belum dikonfirmasi' ? 'selected' : '' }}>Belum Dikonfirmasi</option>
                            <option value="proses" {{ $booking->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
