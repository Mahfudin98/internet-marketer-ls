@extends('layouts.template')

@section('css')

@endsection

@section('title')
    Manage Product
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Manage Product</h4>
                    @if (session('success'))
                        <div id="success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div id="error">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">All Produk Yang Dijual</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr class="solid-header">
                                        <th class="pl-4 text-center">Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Type</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($memberprod as $row)
                                        <tr>
                                            <td class="pr-0 pl-4 text-center">
                                                <img class="profile-img img-sm"
                                                    src="{{ url('/storage/product/' . $row->product->image) }}"
                                                    alt="profile image">
                                            </td>
                                            <td>
                                                <small>{{ $row->product->name }}</small>
                                            </td>
                                            <td>
                                                @if ($row->product->type == 0)
                                                    <span class="badge badge-success">Paket</span>
                                                @else
                                                    <span class="badge badge-primary">Ecer</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <strong>{{ $row->stok }}</strong>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('member.produk.destroy', $row->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger has-icon" type="submit"><i
                                                            class="mdi mdi-delete"></i> Hapus Produk</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Masih Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
       $('#success').trigger("click");
   });
   $(document).on('click', '#success', function(e) {
       swal(
           'Success',
           'Stok <b style="color:green;">Success</b> diperbaharui!',
           'success'
       )
   });

   $(document).ready(function() {
       $('#error').trigger("click");
   });
   $(document).on('click', '#error', function(e) {
       swal(
           'Error!',
           'Stok <b style="color:red;">Gagal</b> diperbaharui!',
           'error'
       )
   });
</script>
@endsection
