@extends('backend.layouts.main')

@section('menuDataPasien', 'active')
@section('content')

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Pasien
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Foto</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Phone</th> 
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
                                        {{-- <a href="{{ route('data-pasien.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a> --}}
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
