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
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tahun</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
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
                            <h3>Donut Chart</h3>
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
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/src/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/charts/chartjs.addon.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/template.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        if ($("#chart-bar").length) {
            const cData = JSON.parse('<?php echo $chart_data; ?>');
            const chart = cData.reseller;
            const range = Array.from(chart, function(o){return moment(o.labels).format("DD")});
            const dCount = Array.from(chart, function(o){return o.total});
            // agen
            const agen = cData.agen;
            const dCountAgen = Array.from(agen, function(o){return o.total});

            const dataSet = {
                labels: range,
                datasets: [
                    {
                        label: "Reseller",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: dCount
                    },
                    {
                        label: "Agen",
                        backgroundColor: 'rgb(48, 128, 208)',
                        borderColor: 'rgb(48, 128, 208)',
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
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('chart-bar'),
                config
            );
            console.log(dCount);
        }
    </script>
@endsection
