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
                    <li class="breadcrumb-item active" aria-current="page">Edit Sosmed Form</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Edit Sosmed</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form action="{{ route('member.sosmed.post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="anggota_id" value="{{ auth()->guard('member')->user()->id }}">
                                    <div class="form-group row showcase_row_area">
                                        <label for="fb">Facebook</label>
                                        <input type="text" class="form-control" id="fb" name="fb" value="{{ $sosmed->facebook }}">
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="ig">Instagram</label>
                                        <input type="text" class="form-control" id="ig" name="ig" value="{{ $sosmed->instagram }}">
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="tt">Tiktok</label>
                                        <input type="text" class="form-control" id="tt" name="tt" value="{{ $sosmed->tiktok }}">
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <label for="shopee">Shopee</label>
                                        <input type="text" class="form-control" id="shopee" name="shopee" value="{{ $sosmed->shopee }}">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
