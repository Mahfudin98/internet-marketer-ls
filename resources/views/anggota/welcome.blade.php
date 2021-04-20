@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Solusi Terbaik Untuk Kulit Anda</h1>
          <h2>Selalu Memberikan Pelayanan Terbaik Untuk Mengatasi Masalah Kulit Anda.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#pricing" class="btn-get-started scrollto">Mulai Sekarang</a>
            <a href="https://www.youtube.com/watch?v=rSSXpgCB9_0" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('img/banner.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">
          {{-- <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="template/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div> --}}
          <div class="col-3"></div>
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <a href="https://shopee.co.id/larossa.?v=817&smtt=0.0.3" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/icon/shopee.png') }}" class="img-fluid" alt=""></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <a href="https://www.lazada.co.id/shop/ls-skincare/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/icon/lazada.png') }}" class="img-fluid" alt=""></a>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <a href="https://lsstore.lsofficial.id/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/icon/lsskincare.png') }}" class="img-fluid" alt=""></a>
          </div>

          {{--

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="template/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="template/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div> --}}

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p style="text-align: justify; text-justify: inter-word;">
                LS Skincare adalah brand skincare yang sudah terdaftar di Badan POM RI besutan PT LS Astari Suksestama. Perusahaan ini dinahkodai oleh pasangan suami istri dan juga pengusaha muda Aceng Sunanto dan Mila Rosmala Rossa.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="text-align: justify; text-justify: inter-word;">
                LS Skincare ini sudah mendapatkan penghargaan sebagai bentuk apresiasi Pusat Prestasi Indonesia kepada brand-brand skincare atas pencapaian penjualan produk skincarenya dalam kurun waktu 1 tahun. LS Skincare merupakan skincare yang best seller di marketplace Indonesia. Penghargaan tersebut diumumkan pada Jumat, 19 Februari 2021 di Aston Priority Simatupang Hotel Jakarta.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>LS-SKINCARE sudah diakui sebagai <strong>BEST PRODUK SKINCARE 2021</strong></h3>
              <p>
                LS Skincare adalah brand skincare yang sudah terdaftar di Badan POM RI besutan PT LS Astari Suksestama.
              </p>
            </div>

            <div class="accordion-list services">
              <div class="row">
                <div class="col-xl-12 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card icon-box">
                        <div class="card-body">
                            <a href="https://www.timesindonesia.co.id/read/news/329158/ls-skincare-produk-kecantikan-majalengka-raih-penghargaan-best-product-skincare-2021" style="text-align: justify; text-justify: inter-word;">
                                LS Skincare, Produk Kecantikan Majalengka Raih Penghargaan Best Product Skincare 2021
                            </a>
                            <hr>
                            <p style="text-align: justify; text-justify: inter-word;">
                                TIMESINDONESIA, MAJALENGKA – .LS Skincare yang merupakan brand PT LS Astari Suksestama mendapatkan penghargaan sebagai Best Produk Skincare 2021 yang diselenggarakan oleh Pusat Prestasi Indonesia.
                            </p>
                            <sub>Sumber : timesindonesia.co.id</sub>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("img/ls-skincare.jpg");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>LS SKINCARE BPOM CREAM PEMUTIH WAJAH BRIGHTENING GLOWING</h3>
            <p class="font-italic">
                Lebih dari 90% perempuan menyatakan bahwa skincare merupakan kebutuhan bagi mereka. Selain menjadi kebutuhan ternyata skincare juga bisa menjadi rutinitas sehat yang dapat dilakukan perempuan agar dapat mengurangi resiko masalah pada kulit.
            </p>
            <p>Paket Brigthening Basic BPOM LS SKINCARE Terdiri  dari :</p>
            <div class="skills-content">

              <ul>
                  <li>
                    A. BRIGHTENING FACIAL WASH 100 ml (POM NA18201204319)
                  </li>
                  <li>
                    B. TONER BRIGHTENING 60 ml (POM NA18201204320)
                  </li>
                  <li>
                    C. BRIGHTENING DAY CREAM 10 gr (POM NA 18200105973)
                  </li>
                  <li>
                    D. BRIGHTENING NIGHT CREAM 10 gr (BPOM)
                  </li>
                  <li>
                    E. BRIGHTENING SERUM VIT C  (POM NA18201901338)
                  </li>
                  <li>
                    F.  Free Pouch Kosmetik
                  </li>
                  <li>
                    G. Free Mysteri BOX
                  </li>
              </ul>

            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Data Agen dan Reseller disini</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    {{-- <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section> --}}
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Produk</h2>
          <p>
            Produk LS SKINCARE terbukti menjadi produk yang Best Seller yang sudah digunakan 174.639 lebih perempuan di Indonesia.
          </p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          {{-- <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li> --}}
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_1.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>RED JELLY CREAM </h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_1.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM NA18201901341)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-RED-JELLY-GLOWING-CREAM-WAJAH-KOSMETIK-KECANTIKAN-I-LS-SKINCARE-(ELSTM)-i.161004486.2680324035" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_2.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>BRIGTHENING DAY CREAM</h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_2.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM  NA18201522665)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-BRIGTHENING-DAY-GLOWING-CREAM-WAJAH-KOSMETIK-KECANTIKAN-I-LS-SKINCARE-(ELSTM)-i.161004486.2465908009" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_3.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>BRIGTENING TONER AHA</h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_3.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM NA18201204320)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-BRIGTENING-TONER-AHA-GLOWING-CREAM-WAJAH-KOSMETIK-KECANTIKAN-I-LS-SKINCARE-(ELSTM-i.161004486.2465813519" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_4.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>SERUM VIT C</h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_4.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM NA18201901338)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-SERUM-VIT-C-GLOWING-CREAM-WAJAH-KOSMETIK-PERAWATAN-KECANTIKAN-I-LS-SKINCARE-(ELSTM)-i.161004486.2653044065" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_5.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>FACIAL WASH AHA</h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_5.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM NA18201204319)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-FACIAL-WASH-AHA-GLOWING-CREAM-WAJAH-KOSMETIK-KECANTIKAN-I-LS-SKINCARE-(ELSTM)-i.161004486.2465934614" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="{{ asset('img/product/product_6.jpeg') }}" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>BRIGTHENING NIGHT CREAM</h4>
              <p>BPOM</p>
              <a href="{{ asset('img/product/product_6.jpeg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="(POM NA18200105977)"><i class="bx bx-plus"></i></a>
              <a href="https://shopee.co.id/LS-SKINCARE-BPOM-BRIGTHENING-NIGHT-GLOWING-CREAM-WAJAH-KOSMETIK-KECANTIKAN-I-LS-SKINCARE-(ELSTM)-i.161004486.2465853486" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        {{--
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="template/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="template/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="BPOM"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="template/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="template/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="BPOM"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="template/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="template/assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="BPOM"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        --}}

        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="template/assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="template/assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="template/assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="template/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Join Agen & Reseller</h2>
          <p>
            Takut Gak Laku? Gak Bisa Jualan? itu yang kita cari, Karna kamu bakal di ajarin dari zero to hero di dalam Group “Belajar Bareng Bos Imers” miliknya secara Online.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <div class="text-center">
                <h3>Join Reseller</h3>
                <h4><sup>Rp</sup>594<sub>rb</sub></h4>
              </div>
              <ul>
                <li><i class="bx bx-check"></i> Mendapat 3 Produk Best Seller gratis LS SKINCARE</li>
                <li><i class="bx bx-check"></i> Mendapat Member Card</li>
                <li><i class="bx bx-check"></i> Mendapat Banner</li>
                <li><i class="bx bx-check"></i> Gift Home Dress dari Larossa Fashion</li>
                <li><i class="bx bx-check"></i> Keuntungan sampai dengan 40rb/produk</li>
                <li><i class="bx bx-check"></i> Harga lebih murah</li>
                {{-- <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li> --}}
              </ul>
              <div class="text-center">
                <a href="#" class="buy-btn">Mulai Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <div class="text-center">
                <h3>Join Agen</h3>
                <h4><sup>Rp</sup>15<sub>jt</sub></h4>
              </div>
              <ul>
                <li><i class="bx bx-check"></i> Keuntungan produk sampai dengan 60rb/produk</li>
                <li><i class="bx bx-check"></i> Mendapat Harga Agen</li>
                <li><i class="bx bx-check"></i> Mendapat Banner Agen</li>
                <li><i class="bx bx-check"></i> Gift Home Dress dari Larossa Fashion</li>
                <li><i class="bx bx-check"></i> Mendapat member card Agen VVIP</li>
                <li><i class="bx bx-check"></i> Free Landing Page (Domain & Hosting dengan CTA Langsung ke nomor agen)</li>
                <li><i class="bx bx-check"></i> Bebas Mix Produk (sesuai kebutuhan Agen)</li>
                <li><i class="bx bx-check"></i> Agen Akan dibina & didampingi dalam proses penjualan</li>
                <li><i class="bx bx-check"></i> Disediakan toko Shoppe dan Lazada (Bisa custom nama toko)</li>
                <li><i class="bx bx-check"></i> Mendapat bimbingan langsung dari Owner LS-Skincare</li>
              </ul>
              <div class="text-center">
                <a href="#" class="buy-btn">Mulai Sekarang</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
