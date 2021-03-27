@extends('layouts.template')

@section('css')

@endsection

@section('title')
    Dashboard
@endsection

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="{{ route('member.index') }}">Home</a></li>
            <li>List Video</li>
          </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
          <h3>
            Selamat Datang <strong>{{ auth()->guard('member')->user()->name }}</strong>
          </h3>
        </div>
    </section>
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="faq-list">
            <ul>
             @if (auth()->guard('member')->user()->type != 'Reseller')
                @foreach ($kategori as $index => $row)
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-{{ $row->id }}">{{ $row->name }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-{{ $row->id }}" class="collapse" data-bs-parent=".faq-list">
                            <p class="text-center">List video kategori <strong style="color: #ffb19d">{{ $row->name }}</strong></p><hr>
                            <section id="team" class="team section-bg">
                                <div class="container" data-aos="fade-up">
                                    <div class="row">

                                        @forelse ($video->where('category_id', $row->id)->chunk(2) as $item)
                                            @foreach ($item as $index => $row)
                                                <div class="col-lg-6 mt-4">
                                                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="{{ $index + 100 }}">
                                                    <div class="pic"><img src="img/logo-ls.png" class="img-fluid" alt=""></div>
                                                    <div class="member-info" data-description="{{ $row->id }}">
                                                        <h4>{{ $row->title }}</h4>
                                                        <span>{{ $row->category->name }}</span>
                                                        <p>
                                                            @if (strlen( $row->description) >= 200)
                                                                {{ substr($row->description,0,200) }}
                                                                <span class="dots">...</span>
                                                                <span class="more" style="display: none;">{{ substr($row->description,200) }}</span>
                                                            @else
                                                                {{ $row->description }}
                                                            @endif
                                                        </p>
                                                        <br>
                                                        @if (strlen( $row->description) >= 200)
                                                        <button onclick="readMore('{{ $row->id }}')" class="btn btn-primary myBtn">Baca Selengkapnya</button>
                                                        @endif
                                                        <div class="play">
                                                            <a href="{{ $row->url }}" class="glightbox btn-watch-video"><i class="fas fa-play-circle"></i>Play Video</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @empty
                                            <div class="col-lg-3 mt-4"></div>
                                            <div class="col-lg-6 mt-4">
                                                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                                                <h3>Data Masih Kosong</h3>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </section>
                        </div>
                    </li>
                @endforeach
             @else
                @foreach ($kategori->where('type', 0) as $index => $row)
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-{{ $row->id }}">{{ $row->name }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-{{ $row->id }}" class="collapse" data-bs-parent=".faq-list">
                            <p class="text-center">List video kategori <strong style="color: #ffb19d">{{ $row->name }}</strong></p><hr>
                            <section id="team" class="team section-bg">
                                <div class="container" data-aos="fade-up">
                                    <div class="row">

                                        @forelse ($video->where('category_id', $row->id)->chunk(2) as $item)
                                            @foreach ($item as $index => $row)
                                                <div class="col-lg-6 mt-4">
                                                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="{{ $index + 100 }}">
                                                    <div class="pic"><img src="img/logo-ls.png" class="img-fluid" alt=""></div>
                                                    <div class="member-info" data-description="{{ $row->id }}">
                                                        <h4>{{ $row->title }}</h4>
                                                        <span>{{ $row->category->name }}</span>
                                                        <p>
                                                            @if (strlen( $row->description) >= 200)
                                                                {{ substr($row->description,0,200) }}
                                                                <span class="dots">...</span>
                                                                <span class="more" style="display: none;">{{ substr($row->description,200) }}</span>
                                                            @else
                                                                {{ $row->description }}
                                                            @endif
                                                        </p>
                                                        <br>
                                                        @if (strlen( $row->description) >= 200)
                                                        <button onclick="readMore('{{ $row->id }}')" class="btn btn-primary myBtn">Baca Selengkapnya</button>
                                                        @endif
                                                        <div class="play">
                                                            <a href="{{ $row->url }}" class="glightbox btn-watch-video"><i class="fas fa-play-circle"></i>Play Video</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @empty
                                            <div class="col-lg-3 mt-4"></div>
                                            <div class="col-lg-6 mt-4">
                                                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                                                <h3>Data Masih Kosong</h3>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </section>
                        </div>
                    </li>
                @endforeach
             @endif
            </ul>
          </div>

        </div>
    </section>
</main><!-- End #main -->
@endsection

@section('js')
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"> --}}
    <script>
        function readMore(description) {
        let dots = document.querySelector(`.member-info[data-description="${description}"] .dots`);
        let moreText = document.querySelector(`.member-info[data-description="${description}"] .more`);
        let btnText = document.querySelector(`.member-info[data-description="${description}"] .myBtn`);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.textContent = "Baca Selengkapnya";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.textContent = "Baca Singkat";
            moreText.style.display = "inline";
        }
    }
    </script>
@endsection
