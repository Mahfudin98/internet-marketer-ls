@extends('layouts.template')

@section('css')

@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Dashboard</h4>
                    <p class="text-gray">Welcome back, {{ ucfirst(auth()->guard('member')->user()->name) }}</p>
                </div>
            </div>
            <div class="row">

                <div class="col-md-7 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                            <p class="card-title ml-n1">Order History</p>
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
                <div class="col-lg-5 col-md-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">
                                <p class="card-title">Grafik Stok Produk</p>
                                <div class="btn-group">
                                    <p>Semua Stok <span class="badge badge-primary">
                                        {{ $memberprod->sum('stok') }}
                                    </span></p>
                                </div>
                            </div>
                            <div class="item-wrapper">
                                <canvas id="chartjs-doughnut-chart" width="3600" height="3400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(function() {
        'use strict';
        if ($("#chartjs-doughnut-chart").length) {
            const cData = JSON.parse('<?php echo $chart_data; ?>');
            var DoughnutData = {
                datasets: [{
                    data: cData.stok,
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    borderWidth: chartColors
                }],
                labels: cData.label
            };
            var DoughnutOptions = {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };
            var doughnutChartCanvas = $("#chartjs-doughnut-chart").get(0).getContext("2d");
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: DoughnutData,
                options: DoughnutOptions
            });
        }

    });
</script>
@endsection
