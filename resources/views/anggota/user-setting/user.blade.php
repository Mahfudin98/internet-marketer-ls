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
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 equel-grid">
          <div class="grid">
            <div class="grid-body">
              <div class="split-header">

              </div>
              <div class="d-flex align-items-end mt-2">
                <div class="user-profile text-center" style="display: block;
                    margin-left: auto;
                    margin-right: auto;">
                        <div class="display-avatar animated-avatar">
                            <img class="profile-img img-lg rounded-circle"
                                src="{{ asset('admin/src/assets/images/profile/male/image_1.png') }}"
                                alt="profile image">
                        </div>
                        <div class="info-wrapper">
                            <p class="user-name">{{ ucfirst(auth()->guard('member')->user()->name) }}</p>
                        </div>
                    </div>
              </div>
              {{-- ---------------- --}}
              <div class="d-flex flex-row mt-4 mb-4">
                <button class="btn btn-primary w-100 ml-2" type="button">
                    <i class="mdi mdi-pencil"></i> Edit Profile
                </button>
              </div>
              <div class="d-flex mt-5 mb-3">
                <small class="mb-0 text-primary">{{ strtoupper(auth()->guard('member')->user()->type) }}</small>
              </div>
              <div class="d-flex justify-content-between border-bottom py-2">
                <p class="text-black">Username</p>
                <p class="text-gray">{{ auth()->guard('member')->user()->username }}</p>
              </div>
              <div class="d-flex justify-content-between border-bottom py-2">
                <p class="text-black">Phone</p>
                <p class="text-gray">{{ preg_replace("/^62/", "0", auth()->guard('member')->user()->phone) }}</p>
              </div>
              <div class="d-flex justify-content-between pt-2">
                <p class="text-black">Join On</p>
                <p class="text-gray">{{ date_format(auth()->guard('member')->user()->created_at, "d F, Y") }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-12 equel-grid">
          <div class="grid widget-revenue-card">
            <div class="grid-body d-flex flex-column h-100">
              <div class="split-header">
                <p class="card-title">Server Load</p>
                <div class="content-wrapper v-centered">
                  <small class="text-muted">2h ago</small>
                  <span class="btn action-btn btn-refresh btn-xs component-flat">
                    <i class="mdi mdi-autorenew text-muted mdi-2x"></i>
                  </span>
                </div>
              </div>
              <div class="mt-auto">
                <canvas id="cpu-performance" height="80"></canvas>
                <h3 class="font-weight-medium mt-4">69.05%</h3>
                <p class="text-gray">Storage is getting full</p>
                <div class="w-50">
                  <div class="d-flex justify-content-between text-muted mt-3">
                    <small>Usage</small> <small>35.62 GB / 2TB</small>
                  </div>
                  <div class="progress progress-slim mt-2">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
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
