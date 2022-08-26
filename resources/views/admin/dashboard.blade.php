@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{!! $newMember->where('type', 'Agen') ? $newMember->where('type', 'Agen')->count() : '0' !!}</h3>
                            <p>New Agen</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target=".new-agen">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{!! $newMember->where('type', 'Reseller') ? $newMember->where('type', 'Reseller')->count() : '0' !!}</h3>
                            <p>New Reseller</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target=".new-reseller">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{!! $amount->where('type', 'Agen')->where('status', 1)
                                ? $amount->where('type', 'Agen')->where('status', 1)->count()
                                : '0' !!}</h3>
                            <p>Amount Agen</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target=".amount-agen">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{!! $amount->where('type', 'Reseller')->where('status', 1)
                                ? $amount->where('type', 'Reseller')->where('status', 1)->count()
                                : '0' !!}</h3>
                            <p>Amount Reseller</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target=".amount-reseller">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bulan</label>
                                            <select id="select-month" class="form-select"
                                                aria-label="Default select example" onchange="getDate()">
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tahun</label>
                                            <select id="select-year" class="form-select" aria-label="Default select example"
                                                onchange="getDate()"></select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-bar" width="600" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Donut Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="donat-bar" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('admin.list.agen')
    @include('admin.list.reseller')
    @include('admin.list.new-agen')
    @include('admin.list.new-reseller')
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/src/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/charts/chartjs.addon.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/template.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        var dateObj = new Date();
        var month = dateObj.getMonth() + 1;
        var year = dateObj.getFullYear();
        if (month < 10) {
            month = "0" + month;
        }

        years(year);

        function years(item) {
            return _.range(2019, moment().add(1, "years").format("Y"));
        }
        _.forEach(years(), function(value) {
            $('#select-year').append($("<option></option>").attr("value", value).text(value));
        });

        // axios
        const $axios = axios.create({
            baseURL: '/api',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        $('#select-month').val(month);
        $('#select-year').val(year);

        function getDate() {
            var bulan = document.getElementById("select-month");
            var tahun = document.getElementById("select-year");

            var selectBulan = bulan.options[bulan.selectedIndex];
            var selectTahun = tahun.options[tahun.selectedIndex];

            $axios.get(`/reseller-bar?year=` + selectTahun.value + `&month=` + selectBulan.value).then(function(response) {
                if ($("#chart-bar").length) {
                    const cData = response.data;
                    const chart = cData.reseller;
                    const range = Array.from(chart, function(o) {
                        return moment(o.labels).format("DD")
                    });
                    const dCount = Array.from(chart, function(o) {
                        return o.total
                    });
                    // agen
                    const agen = cData.agen;
                    const dCountAgen = Array.from(agen, function(o) {
                        return o.total
                    });
                    const dataSet = {
                        labels: range,
                        datasets: [{
                                label: "Reseller",
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                stack: 'combined',
                                data: dCount
                            },
                            {
                                label: "Agen",
                                backgroundColor: 'rgb(48, 128, 208)',
                                borderColor: 'rgb(48, 128, 208)',
                                stack: 'combined',
                                data: dCountAgen
                            },
                        ]
                    }
                    const config = {
                        type: 'bar',
                        data: dataSet,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Chart.js Bar Chart'
                                }
                            },
                            scales: {
                                y: {
                                    stacked: true
                                }
                            }
                        }
                    };
                    const myChart = new Chart(
                        document.getElementById('chart-bar'),
                        config
                    );
                }
            });
        }
        getDate();

        $(function() {
            'use strict';
            if ($("#donat-bar").length) {
                const cData = JSON.parse('<?php echo $chart_data; ?>');
                const cMap = [cData.resellerAktif, cData.resellerNoAktif, cData.agenAktif, cData.agenNoAktif ];
                var DoughnutData = {
                    datasets: [{
                        data: cMap,
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
                var doughnutChartCanvas = $("#donat-bar").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: DoughnutData,
                    options: DoughnutOptions
                });
            }

        });
    </script>
@endsection
