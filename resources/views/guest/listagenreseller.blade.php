<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('img/logo-ls.png') }}" rel="icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/team.css') }}">
</head>
<body>
    <!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">DAFTAR AGEN & RESELLER LS SKINCARE</h5>
            <div class="row">
                @foreach ($province as $rows)
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card" style="background-color: #f27272">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ $rows->id }}" aria-expanded="false" aria-controls="collapseThree">
                                    <h3 class="panel-title" style="color: #fff"> {{ $rows->name }} </h3>
                                </button>
                                </h5>
                            </div>
                            <div id="{{ $rows->id }}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($rows->district as $item)
                                            @foreach ($item->anggota->chunk(3) as $agen)
                                                @forelse ($agen->where('type', 'Agen') as $row)
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="image-flip" >
                                                            <div class="mainflip flip-0">
                                                                <div class="frontside">
                                                                    <div class="card">
                                                                        <div class="card-body text-center">
                                                                            @if ($row->image != null)
                                                                            <p><img class=" img-fluid" src="{{ url('/storage/anggota/'.$row->image) }}" width="100px" height="auto" alt="{{ $row->image }}"></p>
                                                                            @else
                                                                            <p><img class=" img-fluid" src="{{ asset('img/logo-ls.png') }}" width="100px" height="auto" alt="{{ $row->image }}"></p>
                                                                            @endif
                                                                            <h4 class="card-title">{{ $row->name }}</h4>
                                                                            <p class="card-text">Agen <strong>{{ $item->name }}</strong></p>
                                                                            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="backside">
                                                                    <div class="card">
                                                                        <div class="card-body text-center mt-4">
                                                                            <h4 class="card-title">{{ $row->name }}</h4>
                                                                            <p class="card-text">{{ $row->alamat }}</p>
                                                                            <hr>
                                                                            @if ($row->link != null)
                                                                            <a href="{{ $row->link }}">
                                                                                <button class="btn btn-primary btn-sm">Order Disini!</button>
                                                                            </a>
                                                                            @else
                                                                            <a href="https://wa.me/{{ $row->phone }}?text=Hallo+kak+.+.+.+Aku+mau+tampil+cantik+dan+glowing+dong+kak.+Mohon+dibantu+ya+kak+%F0%9F%A5%B0%F0%9F%A5%B0">
                                                                                <button class="btn btn-primary btn-sm">Order Disini!</button>
                                                                            </a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-md-12">
                                                        <h3 class="text-center">Tidak ada data</h3>
                                                    </div>
                                                @endforelse
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <hr>
                                    @forelse ($rows->district as $item)
                                        @foreach ($item->anggota->where('type', 'Reseller') as $row)
                                            <h3>List Reseller Provinsi {{ $rows->name }}</h3>
                                            <ul class="list-group">
                                                <li href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"> <strong>{{ $row->name }}</strong></h5>
                                                    <small>{{ $item->name }}</small>
                                                </div>
                                                <p class="mb-1">{{ $row->alamat }}</p>
                                                    <small>
                                                        <a href="#"><button class="btn btn-primary btn-sm">Order Disini!</button></a>
                                                    </small>
                                                </li>
                                            </ul>
                                        @endforeach
                                    @empty
                                        <div class="col-md-12">
                                            <h3 class="text-center">Tidak ada data</h3>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ $row->name }} </h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" >
                                        <div class="mainflip flip-0">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_02.png" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_03.png" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_04.jpg" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_05.png" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                                <!-- Team member -->
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_06.jpg" alt="card image"></p>
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Sunlimetech</h4>
                                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Team member -->
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach

            </div>
        </div>
    </section>
    <!-- Team -->

    <script>
        $(document).on('click', '.panel-heading span.clickable', function(e){
            var $this = $(this);
            if(!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');

            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

            }
        })
    </script>
</body>
</html>
