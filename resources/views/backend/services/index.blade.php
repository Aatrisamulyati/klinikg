@extends('backend.layouts.main')

@section('menuDataServices', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Services
            </div>
            <div class="card-body">
                <a href="{{ route('data-services.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Services
                </a>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Services</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicess as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_services }}</td>
            
                                <td>{{ $data->harga_satuan }}</td>
                                <td>{{ $data->stok }}</td>

                                {{-- <td>{{ $data->ulasan }}</td> --}}
                                <td>
                                    <a href="{{ route('data-services.show', $data->id) }}" class="btn btn-sm btn-info" role="button">Lihat</a>
                                    <a href="{{ route('data-services.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-services.destroy', $data->id) }}" method="POST" class="d-inline">
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
