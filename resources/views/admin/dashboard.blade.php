@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <main>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Step Chart</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="chartjs-staked-bar-chart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Doughnut Chart</h2>
                    </div>
                    <div class="card-body">
                        <div class="item-wrapper">
                            <canvas id="chartjs-doughnut-chart" width="600" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($member as $row)
                                        <tr>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $row->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ preg_replace('/^62/', '0', $row->phone) }}</td>
                                            <td>{{ $row->type }}</td>
                                            <td>
                                                {{ $row->member->sum('stok') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Data Masih Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $member->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('admin.produk.stok')
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('admin/src/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/src/assets/js/charts/chartjs.addon.js') }}"></script>
<script src="{{ asset('admin/src/assets/js/template.js') }}"></script>
<script>
    if ($("#chartjs-staked-bar-chart").length) {
        const cData = JSON.parse('<?php echo $chart_data; ?>');
        const chart = cData.bar;
        const name = Array.from(new Set(chart.map(o => o.nama)));
        const namePerName = name.map(d => chart.filter(o => o.nama == d));
        const numberOfName = Math.max.apply(null, namePerName.map(chart => chart.length));
        const dataSets = [];
        for (let i = 0; i < numberOfName; i++) {
            dataSets.push({
                label: namePerName.map(chart => i < chart.length ? chart[i].product : ''),
                data: namePerName.map(chart => i < chart.length ? chart[i].stok : 0),
                backgroundColor: name.map(d =>
                    "rgba(" + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) +
                    "," + Math.floor(Math.random() * 255) + ", 0.5)"),
                borderColor: name.map(d =>
                    "rgba(" + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) +
                    "," + Math.floor(Math.random() * 255) + ", 0.5)"),
                borderWidth: 0,
            });
        }
        var BarData = {
            labels: name,
            datasets: dataSets
        };
        var barChartCanvas = $("#chartjs-staked-bar-chart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: BarData,
            options: {
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                },
                legend: false
            }
        });
    }

    $(function() {
        'use strict';
        if ($("#chartjs-doughnut-chart").length) {
            const cData = JSON.parse('<?php echo $chart_data; ?>');
            var DoughnutData = {
                datasets: [{
                    data: cData.sum,
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    borderWidth: chartColors
                }],
                labels: cData.labels
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
