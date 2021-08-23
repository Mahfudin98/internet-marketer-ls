@extends('layouts.template')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Dashboard</h4>
                    <p class="text-gray">Welcome back, {{ ucfirst(
    auth()->guard('member')->user()->name,
) }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <h2 class="grid-title">Chart Point</h2>
                            <div class="item-wrapper">
                                <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <p class="card-title">Point kamu saat ini</p>
                            <br><br><br>
                            <div class="circle green">{{ $mamberpoint->point }}</div>
                            <p class="text-center">Point Kamu <span class="badge badge-success">{{ $mamberpoint->point }}</span></p>
                        </div>
                    </div>
                </div>
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

@section('css')
    <style>
        .circle {
            width: 200px;
            height: 200px;
            line-height: 200px;
            border-radius: 50%;
            /* the magic */
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            text-align: center;
            color: white;
            font-size: 100px;
            text-transform: uppercase;
            font-weight: 700;
            margin: 0 auto 40px;
        }

        .blue {
            background-color: #3498db;
        }

        .green {
            background-color: #16a085;
        }

        .red {
            background-color: #e74c3c;
        }

    </style>
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

            if ($("#chartjs-bar-chart").length) {
                const cData = JSON.parse('<?php echo $chart_data; ?>');
                var BarData = {
                    labels: cData.anggota,
                    datasets: [{
                        label: 'Point',
                        data: cData.point,
                        backgroundColor: chartColors,
                        borderColor: chartColors,
                        borderWidth: 0
                    }]
                };
                var barChartCanvas = $("#chartjs-bar-chart").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: BarData,
                    options: {
                        legend: false
                    }
                });
            }
        });
    </script>
@endsection
