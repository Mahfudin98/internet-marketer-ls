@extends('layouts.template')

@section('css')

@endsection

@section('title')
    Stok
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Stok</h4>
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
                            <p class="card-title ml-n1">All Produk {{ ucfirst(auth()->guard('member')->user()->name) }}</p>
                        </div>
                        <form action="{{ route('member.update.stock') }}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr class="solid-header">
                                            <th class="pl-4">Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Type</th>
                                            <th>Edit Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($memberprod as $row)
                                            <tr>
                                                <td class="pr-0 pl-4">
                                                    <img class="profile-img img-sm"
                                                        src="{{ url('/storage/product/' . $row->product->image) }}"
                                                        alt="profile image">
                                                </td>
                                                <td>
                                                    <small>{{ $row->product->name }}</small>
                                                </td>
                                                <td>
                                                    @if ($row->product->type == 0)
                                                        <span class="badge badge-warning">Paket</span>
                                                    @else
                                                        <span class="badge badge-primary">Ecer</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="number" name="stock[{{ $row->id }}]" class="form-control"
                                                        value="{{ $row->stok }}">
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
                            <div class="border-top px-3 py-2 d-block text-gray">
                                <button class="btn btn-primary has-icon" type="submit"><i class="mdi mdi-content-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">
                                <p class="card-title">Riwayat Update Stok</p>
                                {{-- <div class="btn-group">
                                    <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Expand View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </div>
                                </div> --}}
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
                        <a class="border-top px-3 py-2 d-block text-gray" href="#">
                            <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i> View All </small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
