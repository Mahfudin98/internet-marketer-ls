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
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Order History</p>
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
                                            <th>Aksi</th>
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
                                                        <span class="badge badge-success">Paket</span>
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
                                <p class="card-title">Activity Log</p>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <div class="activity-log">
                                        <p class="log-name">Agnes Holt</p>
                                        <div class="log-details">Analytics dashboard has been created<span
                                                class="text-primary ml-1">#Slack</span></div>
                                        <small class="log-time">8 mins Ago</small>
                                    </div>
                                    <div class="activity-log">
                                        <p class="log-name">Ronald Edwards</p>
                                        <div class="log-details">Report has been updated <div class="grouped-images mt-2">
                                                <img class="img-sm" src="../assets/images/profile/male/image_4.png"
                                                    alt="Profile Image" data-toggle="tooltip" title="Gerald Pierce">
                                                <img class="img-sm" src="../assets/images/profile/male/image_5.png"
                                                    alt="Profile Image" data-toggle="tooltip" title="Edward Wilson">
                                                <img class="img-sm" src="../assets/images/profile/female/image_6.png"
                                                    alt="Profile Image" data-toggle="tooltip" title="Billy Williams">
                                                <img class="img-sm" src="../assets/images/profile/male/image_6.png"
                                                    alt="Profile Image" data-toggle="tooltip" title="Lelia Hampton">
                                                <span class="plus-text img-sm">+3</span>
                                            </div>
                                        </div>
                                        <small class="log-time">3 Hours Ago</small>
                                    </div>
                                    <div class="activity-log">
                                        <p class="log-name">Charlie Newton</p>
                                        <div class="log-details"> Approved your request <div class="wrapper mt-2">
                                                <button type="button" class="btn btn-xs btn-primary">Approve</button>
                                                <button type="button" class="btn btn-xs btn-inverse-primary">Reject</button>
                                            </div>
                                        </div>
                                        <small class="log-time">2 Hours Ago</small>
                                    </div>
                                    <div class="activity-log">
                                        <p class="log-name">Gussie Page</p>
                                        <div class="log-details">Added new task: Slack home page</div>
                                        <small class="log-time">4 Hours Ago</small>
                                    </div>
                                    <div class="activity-log">
                                        <p class="log-name">Ina Mendoza</p>
                                        <div class="log-details">Added new images</div>
                                        <small class="log-time">8 Hours Ago</small>
                                    </div>
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
