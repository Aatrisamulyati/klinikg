@extends('backend.layouts.main')

@section('menuDataTransaksi', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Transaksi
            </div>
            <div class="card-body">
                <a href="{{ route('data-transaksi.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Transaksi
                </a>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Tanggal Transaksi</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pasien->nama_pasien }}</td>
                                <td>{{ $data->dokter->nama_dokter }}</td>
                                <td>{{ $data->tgl_transaksi }}</td>
                                <td>{{ $data->total }}</td>
                                <td>{{ $data->status }}</td>
                                
                                    <a href="{{ route('data-transaksi.show', $data->id) }}" class="btn btn-sm btn-info" role="button">Lihat</a>
                                    <a href="{{ route('data-transaksi.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-transaksi.destroy', $data->id) }}" method="POST" class="d-inline">
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
