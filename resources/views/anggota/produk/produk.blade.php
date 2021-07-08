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
                      <img class="profile-img img-sm" src="{{ url('/storage/anggota/'.$row->image) }}" alt="profile image">
                    </td>
                    <td>
                      <small>{{ $row->name }}</small>
                    </td>
                    <td> Just Now </td>
                    <td> </td>
                  </tr>
                  @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Masih Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{-- <a class="border-top px-3 py-2 d-block text-gray" href="#">
              <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small>
            </a> --}}
          </div>
        </div>
        <div class="col-md-4 equel-grid">
          <div class="grid">
            <div class="grid-body">
              <div class="split-header">
                <p class="card-title">Daftar produk yang dijual</p>
                <div class="btn-group">
                  <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Expand View</a>
                    <a class="dropdown-item" href="#">Edit</a>
                  </div>
                </div>
              </div>
              <div class="vertical-timeline-wrapper">
                <div class="timeline-vertical dashboard-timeline">
                    @forelse ($member->where('anggota_id', auth()->guard('member')->user()->id) as $row)
                    <div class="activity-log">
                        <p class="log-name">{{ $row->product->name }}</p>
                        <div class="log-details">Report has been updated <div class="grouped-images mt-2">
                            <img class="img-sm" src="{{ url('/storage/anggota/'.$row->product->image) }}" alt="{{ $row->product->name }}" data-toggle="tooltip" title="{{ $row->product->name }}">
                          </div>
                        </div>
                        <small class="log-time">Stok : {{ $row->stock }}</small>
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
