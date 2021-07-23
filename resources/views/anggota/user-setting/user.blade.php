@extends('layouts.template')

@section('css')

@endsection

@section('title')
    User Setting
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>User Setting <i class="mdi mdi-settings"></i></h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">

                            </div>
                            <div class="d-flex align-items-end mt-2">
                                <div class="user-profile text-center" style="display: block;margin-left: auto;margin-right: auto;">
                                    <div class="display-avatar animated-avatar">
                                        @if (auth()->guard('member')->user()->image != null)
                                            <img class="profile-img img-lg rounded-circle"
                                                src="{{ url('/storage/anggota/' .auth()->guard('member')->user()->image) }}"
                                                alt="profile image">
                                        @else
                                            <img class="profile-img img-lg rounded-circle"
                                                src="{{ asset('img/logo-ls.png') }}" alt="profile image">
                                        @endif
                                    </div>
                                    <div class="info-wrapper">
                                        <p class="user-name">{{ ucfirst(auth()->guard('member')->user()->name,) }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- ---------------- --}}
                            <div class="d-flex flex-row mt-4 mb-4">
                                <a href="{{ route('member.setting.edit') }}" class="w-100 ml-2">
                                    <button class="btn btn-primary w-100 ml-2" type="button">
                                        <i class="mdi mdi-pencil"></i> Edit Profile
                                    </button>
                                </a>
                            </div>
                            <div class="d-flex mt-5 mb-3">
                                <small class="mb-0 text-primary">{{ strtoupper(auth()->guard('member')->user()->type,) }}</small>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Username</p>
                                <p class="text-gray">{{ auth()->guard('member')->user()->username }}</p>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Phone</p>
                                <p class="text-gray">{{ preg_replace('/^62/','0',auth()->guard('member')->user()->phone) }}</p>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <p class="text-black">Join On</p>
                                <p class="text-gray">{{ date_format(auth()->guard('member')->user()->created_at,'d F, Y',) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">

                            </div>
                            <div class="d-flex align-items-end mt-2">

                            </div>
                            {{-- ---------------- --}}
                            <div class="d-flex mt-5 mb-3">
                                <small class="mb-0 text-primary">List Sosmed & Marketplace</small>
                            </div>
                            @if ($sosmed != null)
                            @if ($sosmed->facebook != null)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Facebook</p>
                                <a href="{{ $sosmed->facebook }}" class="text-gray">Klik disini!</a>
                            </div>
                            @endif
                            @if ($sosmed->instagram != null)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Instagram</p>
                                <a href="{{ $sosmed->instagram }}" class="text-gray">Klik disini!</a>
                            </div>
                            @endif
                            @if ($sosmed->tiktok != null)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Tiktok</p>
                                <a href="{{ $sosmed->tiktok }}" class="text-gray">Klik disini!</a>
                            </div>
                            @endif
                            @if ($sosmed->shopee != null)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Shopee</p>
                                <a href="{{ $sosmed->shopee }}" class="text-gray">Klik disini!</a>
                            </div>
                            @endif
                            @endif
                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-black">Profile Page</p>
                                <a class="text-gray" href="{{ route('member.profile', auth()->guard('member')->user()->slug) }}">Klik disini!</a>
                            </div>
                            <hr>
                            @if ($sosmed != null)
                            <div class="d-flex flex-row mt-4 mb-4">
                                <a href="{{ route('member.sosmed.edit') }}" class="w-100 ml-2">
                                    <button class="btn btn-primary w-100 ml-2" type="button">
                                        <i class="mdi mdi-pencil"></i> Edit Sosmed
                                    </button>
                                </a>
                            </div>
                            @else
                            <div class="d-flex flex-row mt-4 mb-4">
                                <a href="{{ route('member.sosmed') }}" class="w-100 ml-2">
                                    <button class="btn btn-primary w-100 ml-2" type="button">
                                        <i class="mdi mdi-pencil"></i> Add Sosmed
                                    </button>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Daftar Produk
                                {{ ucfirst(auth()->guard('member')->user()->name,) }}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr class="solid-header">
                                        <th class="pl-4">Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Type</th>
                                        <th>Stok</th>
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
                                                <strong>{{ $row->stok }}</strong>
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

@endsection
