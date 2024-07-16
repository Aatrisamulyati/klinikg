@extends('backend.layouts.main')

@section('menuDataProduct', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Product
            </div>
            <div class="card-body">
                <a href="{{ route('data-product.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Product
                </a>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Gambar</th>
                            <th>Harga Satuan </th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_product }}</td>
                                <td>
                                   <img src="{{ $data->gambar ? asset('images/product/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar"
                                   class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                                {{-- @if ($data->gambar)
                                <img src="{{ asset('images/product/' . $data->gambar) }}" alt="gambar"
                                    class="img-fluid table-img" style="width: 60px; height: 60px;">
                                    @else
                                    <img src="{{asset('/images/no_images.jpg')}}" alt="no image" class="img-fluid table-img">
                                @endif --}}
                                </td>
                                {{-- <td>{{ $data->harga_satuan }}</td> --}}
                                <td>Rp. {{ number_format($data->harga_satuan, 0, ',', '.') }}</td>
                                <td>{{ $data->stok }}</td>

                                {{-- <td>{{ $data->ulasan }}</td> --}}
                                <td>
                                    <a href="{{ route('data-product.show', $data->id) }}" class="btn btn-sm btn-info" role="button">Lihat</a>
                                    <a href="{{ route('data-product.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-product.destroy', $data->id) }}" method="POST" class="d-inline">
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
