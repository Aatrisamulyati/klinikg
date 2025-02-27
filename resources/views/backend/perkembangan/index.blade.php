@extends('backend.layouts.main')

@section('menuDataPerkembangan', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Perkembangan
            </div>
            <div class="card-body">
                <a href="{{ route('data-perkembangan.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Perkembangan
                </a>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pasien }}</td>
                                
                                <td><img src="{{ $data->foto_profile ? asset('images/product/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar"
                                    class="img-fluid table-img rounded" style="width: 60px; height: 60px;"></td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->tgl_lahir }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->alamat }}</td>

                                {{-- <td>{{ $data->ulasan }}</td> --}}
                                <td>
                                    <a href="{{ route('data-pasien.show', $data->id) }}" class="btn btn-sm btn-info" role="button">Lihat</a>
                                    <a href="{{ route('data-pasien.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-pasien.destroy', $data->id) }}" method="POST" class="d-inline">
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