@extends('layouts.template')

@section('css')

@endsection

@section('title')
    Produk
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Produk</h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Daftar Produk LS SKINCARE</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr class="solid-header">
                                        <th class="pl-4">Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Type</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product as $row)
                                        <tr>
                                            <td class="pr-0 pl-4">
                                                <img class="profile-img img-sm"
                                                    src="{{ url('/storage/product/' . $row->image) }}"
                                                    alt="profile image">
                                            </td>
                                            <td>
                                                <small>{{ $row->name }}</small>
                                            </td>
                                            <td>
                                                @if ($row->type == 0)
                                                    <span class="badge badge-warning">Paket</span>
                                                @else
                                                    <span class="badge badge-primary">Ecer</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('member.product.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="name" value="{{ $row->name }}">
                                                    <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                    <button class="btn btn-primary has-icon" type="submit"><i
                                                            class="mdi mdi-plus-circle-outline"></i> Tambah Produk</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">
                                <p class="card-title">Daftar produk yang dijual</p>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('member.produk.edit') }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-wrapper">
                                <div class="timeline-vertical dashboard-timeline">
                                    @forelse ($memberprod as $row)
                                        <div class="activity-log">
                                            <p class="log-name">{{ $row->product->name }}</p>
                                            <div class="log-details">
                                                @if ($row->product->type == 0)
                                                    <span class="badge badge-warning">Paket</span>
                                                @else
                                                    <span class="badge badge-primary">Ecer</span>
                                                @endif
                                            </div>
                                            <small class="log-time">Stok : {{ $row->stok }}</small>
                                        </div>
                                    @empty
                                        <div class="activity-log">
                                            <p class="log-name">Data masih Kosong</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
