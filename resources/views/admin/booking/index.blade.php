@extends('admin.layouts.main')

@section('menuDataBooking', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Transaksi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Nama Layanan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pelanggans->nama }}</td>
                                <td>{{ $data->dokters->nama }}</td>
                                <td>{{ $data->services->nama }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->jam }}</td>
                                <td>{{ $data->status }}</td>
                                
                                    <a href="{{ route('data-booking.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-booking.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm my-2" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection