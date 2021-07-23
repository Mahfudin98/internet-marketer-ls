<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agen {{ $member->district->city->name }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body class="profile-page" style="background-color: #fff3e7">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100"
        id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('guest.index') }}"><img height="35px" width="auto" id="logo"
                        src="{{ asset('img/logo-pas.png') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            {{-- <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">apps</i> Components
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="../index.html" class="dropdown-item">
                                <i class="material-icons">layers</i> All Components
                            </a>

                            <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html"
                                class="dropdown-item">
                                <i class="material-icons">content_paste</i> Documentation
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                            <i class="material-icons">cloud_download</i> Download
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>

    <div class="page-header header-filter" data-parallax="true"
        style="background-image:url('{{ asset('img/bg.png') }}');">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                @if ($member->image != null)
                                    <img src="{{ url('/storage/anggota/' . $member->image) }}" alt="Circle Image"
                                        class="img-raised rounded-circle img-fluid">
                                @else
                                    <img src="{{ asset('img/logo-ls.png') }}" alt="Circle Image"
                                        class="img-raised rounded-circle img-fluid">
                                @endif

                            </div>
                            <div class="name">
                                <h3 class="title">{{ $member->name }}</h3>
                                <h6>{{ $member->type }}</h6>
                                @if ($sosmed != null)
                                    @if ($sosmed->facebook != null)
                                    <a href="{{ $sosmed->facebook }}" class="btn btn-just-icon btn-link btn-dribbble"><i
                                        class="fab fa-facebook"></i></a>
                                    @endif
                                    @if ($sosmed->instagram != null)
                                    <a href="{{ $sosmed->instagram }}" class="btn btn-just-icon btn-link btn-twitter"><i
                                        class="fab fa-instagram"></i></a>
                                    @endif
                                    @if ($sosmed->tiktok != null)
                                    <a href="{{ $sosmed->tiktok }}" class="btn btn-just-icon btn-link btn-pinterest"><i
                                        class="fab fa-tiktok"></i></a>
                                    @endif
                                    @if ($sosmed->shopee != null)
                                    <a href="{{ $sosmed->shopee }}" class="btn btn-just-icon btn-link btn-pinterest"><i
                                        class="fas fa-store"></i></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <h5>Alamat Agen</h5>
                    <p>{{ $member->district->name }}, {{ $member->district->city->name }},
                        {{ $member->district->city->province->name }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    @if ($member->link != null)
                                    <a class="nav-link active" href="{{ $member->link }}">
                                        <i class="fab fa-whatsapp"></i> Order Via Whatsapp
                                    </a>
                                    @else
                                    <a class="nav-link active" href="https://wa.me/{{ $member->phone }}?text=Hallo+kak+.+.+.+Aku+mau+tampil+cantik+dan+glowing+dong+kak.+Mohon+dibantu+ya+kak+%F0%9F%A5%B0%F0%9F%A5%B0">
                                        <i class="fab fa-whatsapp"></i> Order Via Whatsapp
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content tab-space">
                    {{-- <div class="tab-pane active text-center gallery" id="studio">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1528249227670-9ba48616014f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=66b8e7db17b83084f16fdeadfc93b95b&auto=format&fit=crop&w=357&q=80"
                                    class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="https://images.unsplash.com/photo-1521341057461-6eb5f40b07ab?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72da2f550f8cbd0ec252ad6fb89c96b2&auto=format&fit=crop&w=334&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="works">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80"
                                    class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="favorite">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80"
                                    class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center ">
        <p>Copyright © {{ now()->year }} <a href="https://lsskincarepusat.id" target="_blank">LS SKINCARE</a>. All rights reserved</p>
    </footer>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>

    <script type="">
        var big_image;

                            $(document).ready(function() {
                                BrowserDetect.init();

                                // Init Material scripts for buttons ripples, inputs animations etc, more info on the next link https://github.com/FezVrasta/bootstrap-material-design#materialjs
                                $('body').bootstrapMaterialDesign();

                                window_width = $(window).width();

                                $navbar = $('.navbar[color-on-scroll]');
                                scroll_distance = $navbar.attr('color-on-scroll') || 500;

                                $navbar_collapse = $('.navbar').find('.navbar-collapse');

                                //  Activate the Tooltips
                                $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

                                // Activate Popovers
                                $('[data-toggle="popover"]').popover();

                                if ($('.navbar-color-on-scroll').length != 0) {
                                    $(window).on('scroll', materialKit.checkScrollForTransparentNavbar);
                                }

                                materialKit.checkScrollForTransparentNavbar();

                                if (window_width >= 768) {
                                    big_image = $('.page-header[data-parallax="true"]');
                                    if (big_image.length != 0) {
                                        $(window).on('scroll', materialKit.checkScrollForParallax);
                                    }

                                }


                            });

                            $(document).on('click', '.navbar-toggler', function() {
                                $toggle = $(this);

                                if (materialKit.misc.navbar_menu_visible == 1) {
                                    $('html').removeClass('nav-open');
                                    materialKit.misc.navbar_menu_visible = 0;
                                    $('#bodyClick').remove();
                                    setTimeout(function() {
                                        $toggle.removeClass('toggled');
                                    }, 550);

                                    $('html').removeClass('nav-open-absolute');
                                } else {
                                    setTimeout(function() {
                                        $toggle.addClass('toggled');
                                    }, 580);


                                    div = '<div id="bodyClick"></div>';
                                    $(div).appendTo("body").click(function() {
                                        $('html').removeClass('nav-open');

                                        if ($('nav').hasClass('navbar-absolute')) {
                                            $('html').removeClass('nav-open-absolute');
                                        }
                                        materialKit.misc.navbar_menu_visible = 0;
                                        $('#bodyClick').remove();
                                        setTimeout(function() {
                                            $toggle.removeClass('toggled');
                                        }, 550);
                                    });

                                    if ($('nav').hasClass('navbar-absolute')) {
                                        $('html').addClass('nav-open-absolute');
                                    }

                                    $('html').addClass('nav-open');
                                    materialKit.misc.navbar_menu_visible = 1;
                                }
                            });

                            materialKit = {
                                misc: {
                                    navbar_menu_visible: 0,
                                    window_width: 0,
                                    transparent: true,
                                    fixedTop: false,
                                    navbar_initialized: false,
                                    isWindow: document.documentMode || /Edge/.test(navigator.userAgent)
                                },

                                initFormExtendedDatetimepickers: function() {
                                    $('.datetimepicker').datetimepicker({
                                        icons: {
                                            time: "fa fa-clock-o",
                                            date: "fa fa-calendar",
                                            up: "fa fa-chevron-up",
                                            down: "fa fa-chevron-down",
                                            previous: 'fa fa-chevron-left',
                                            next: 'fa fa-chevron-right',
                                            today: 'fa fa-screenshot',
                                            clear: 'fa fa-trash',
                                            close: 'fa fa-remove'
                                        }
                                    });
                                },

                                initSliders: function() {
                                    // Sliders for demo purpose
                                    var slider = document.getElementById('sliderRegular');

                                    noUiSlider.create(slider, {
                                        start: 40,
                                        connect: [true, false],
                                        range: {
                                            min: 0,
                                            max: 100
                                        }
                                    });

                                    var slider2 = document.getElementById('sliderDouble');

                                    noUiSlider.create(slider2, {
                                        start: [20, 60],
                                        connect: true,
                                        range: {
                                            min: 0,
                                            max: 100
                                        }
                                    });
                                },

                                checkScrollForParallax: function() {
                                    oVal = ($(window).scrollTop() / 3);
                                    big_image.css({
                                        'transform': 'translate3d(0,' + oVal + 'px,0)',
                                        '-webkit-transform': 'translate3d(0,' + oVal + 'px,0)',
                                        '-ms-transform': 'translate3d(0,' + oVal + 'px,0)',
                                        '-o-transform': 'translate3d(0,' + oVal + 'px,0)'
                                    });
                                },

                                checkScrollForTransparentNavbar: debounce(function() {
                                    if ($(document).scrollTop() > scroll_distance) {
                                        if (materialKit.misc.transparent) {
                                            materialKit.misc.transparent = false;
                                            $('.navbar-color-on-scroll').removeClass('navbar-transparent');
                                        }
                                    } else {
                                        if (!materialKit.misc.transparent) {
                                            materialKit.misc.transparent = true;
                                            $('.navbar-color-on-scroll').addClass('navbar-transparent');
                                        }
                                    }
                                }, 17)
                            };

                            // Returns a function, that, as long as it continues to be invoked, will not
                            // be triggered. The function will be called after it stops being called for
                            // N milliseconds. If `immediate` is passed, trigger the function on the
                            // leading edge, instead of the trailing.

                            function debounce(func, wait, immediate) {
                                var timeout;
                                return function() {
                                    var context = this,
                                        args = arguments;
                                    clearTimeout(timeout);
                                    timeout = setTimeout(function() {
                                        timeout = null;
                                        if (!immediate) func.apply(context, args);
                                    }, wait);
                                    if (immediate && !timeout) func.apply(context, args);
                                };
                            };

                            var BrowserDetect = {
                                init: function() {
                                    this.browser = this.searchString(this.dataBrowser) || "Other";
                                    this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator
                                        .appVersion) || "Unknown";
                                },
                                searchString: function(data) {
                                    for (var i = 0; i < data.length; i++) {
                                        var dataString = data[i].string;
                                        this.versionSearchString = data[i].subString;

                                        if (dataString.indexOf(data[i].subString) !== -1) {
                                            return data[i].identity;
                                        }
                                    }
                                },
                                searchVersion: function(dataString) {
                                    var index = dataString.indexOf(this.versionSearchString);
                                    if (index === -1) {
                                        return;
                                    }

                                    var rv = dataString.indexOf("rv:");
                                    if (this.versionSearchString === "Trident" && rv !== -1) {
                                        return parseFloat(dataString.substring(rv + 3));
                                    } else {
                                        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
                                    }
                                },

                                dataBrowser: [{
                                        string: navigator.userAgent,
                                        subString: "Chrome",
                                        identity: "Chrome"
                                    },
                                    {
                                        string: navigator.userAgent,
                                        subString: "MSIE",
                                        identity: "Explorer"
                                    },
                                    {
                                        string: navigator.userAgent,
                                        subString: "Trident",
                                        identity: "Explorer"
                                    },
                                    {
                                        string: navigator.userAgent,
                                        subString: "Firefox",
                                        identity: "Firefox"
                                    },
                                    {
                                        string: navigator.userAgent,
                                        subString: "Safari",
                                        identity: "Safari"
                                    },
                                    {
                                        string: navigator.userAgent,
                                        subString: "Opera",
                                        identity: "Opera"
                                    }
                                ]

                            };
                        </script>

</body>

</html>
