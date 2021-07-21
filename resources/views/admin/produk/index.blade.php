@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Product</h1>
@stop

@section('content')
    <main>
        <div class="row">
            <div class="col-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Type</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @forelse ($product as $row)
                                        <tr>
                                            <td>
                                                @if ($row->image != null)
                                                    <img src="{{ url('/storage/product/' . $row->image) }}" width="100px"
                                                        height="auto" alt="{{ $row->image }}">
                                                @else
                                                    <img src="{{ asset('img/logo-ls.png') }}" width="100px" height="auto"
                                                        alt="{{ $row->image }}">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $row->name }}
                                                {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                            {{ $row->name }}
                                        </button> --}}
                                            </td>
                                            <td>
                                                @if ($row->type == 0)
                                                    <span class="badge badge-success">Paket</span>
                                                @else
                                                    <span class="badge badge-primary">Ecer</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('anggota.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('anggota.edit', $row->id) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $product->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Input Produk</h3>
                    </div>
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Produk</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Tipe Produk</label>
                                <select name="type" class="form-control" id="type" required>
                                    <option value="">Pilih Type</option>
                                    <option value="0">Paket</option>
                                    <option value="1">Ecer</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary float-right" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop
