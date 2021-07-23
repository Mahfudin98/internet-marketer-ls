@extends('layouts.template')

@section('css')

@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">User Setting</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Form</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Form Edit Profile</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form action="{{ route('member.setting.update', auth()->guard('member')->user()->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row showcase_row_area">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ auth()->guard('member')->user()->name }}">
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ auth()->guard('member')->user()->username }}" disabled>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukan Password">
                                        <p>*Kosongkan Jika Tidak Ingin Mengganti</p>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="phone">Nomor HP</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{ preg_replace(
    '/^62/',
    '0',
    auth()->guard('member')->user()->phone,
) }}">
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="customFile">File Upload</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <br>
                                        <p>*Kosongkan Jika Tidak Ingin Mengganti</p>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">

                            </div>
                            <div class="d-flex align-items-end mt-2">
                                <div class="user-profile text-center" style="display: block;
                              margin-left: auto;
                              margin-right: auto;">
                                    <div class="display-avatar animated-avatar">
                                        @if (auth()->guard('member')->user()->image != null)
                                            <img class="profile-img img-lg rounded-circle"
                                                src="{{ url(
    '/storage/anggota/' .
        auth()->guard('member')->user()->image,
) }}"
                                                alt="profile image">
                                        @else
                                            <img class="profile-img img-lg rounded-circle"
                                                src="{{ asset('img/logo-ls.png') }}" alt="profile image">
                                        @endif
                                    </div>
                                    <div class="info-wrapper">
                                        <p class="user-name">{{ ucfirst(
    auth()->guard('member')->user()->name,
) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- ---------------- --}}
                            <div class="d-flex flex-row mt-4 mb-4">
                                {{-- <a href="{{ route('member.setting.edit') }}" class="w-100 ml-2">
                                    <button class="btn btn-primary w-100 ml-2" type="button">
                                        <i class="mdi mdi-pencil"></i> Edit Profile
                                    </button>
                                </a> --}}
                            </div>
                            <div class="d-flex mt-5 mb-3">
                                <small
                                    class="mb-0 text-primary">{{ strtoupper(
    auth()->guard('member')->user()->type,
) }}</small>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Username</p>
                                <p class="text-gray">{{ auth()->guard('member')->user()->username }}</p>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <p class="text-black">Phone</p>
                                <p class="text-gray">
                                    {{ preg_replace(
    '/^62/',
    '0',
    auth()->guard('member')->user()->phone,
) }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-black">Join On</p>
                                <p class="text-gray">
                                    {{ date_format(
    auth()->guard('member')->user()->created_at,
    'd F, Y',
) }}
                                </p>
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
