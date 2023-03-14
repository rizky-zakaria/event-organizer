@extends('templates.front')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            {{-- <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h6 class="text-light">Welcome to <span>Festival</span></h6>
                    @if (isset($event->nama))
                        <h2 class="text-light">{{ $event->nama }}</h2>
                    @else
                        <h2>-</h2>
                    @endif
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#contact" class="btn-get-started">Daftar Sekarang</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('impact/assets/img/ramadhan-1.png') }}" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div> --}}
            <div class="container">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($img as $item)
                            <div class="carousel-item active">
                                <img src="{{ asset('uploads/img/' . $item->gambar) }}" class="d-block w-100" alt="...">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->nama))
                                    {{ $event->nama }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clock-fill"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->waktu))
                                    {{ $event->waktu }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->tempat))
                                    {{ $event->tempat }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-command"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->penyelenggara))
                                    {{ $event->penyelenggara }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->
    <main id="main">

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact</h2>
                    <p>Untuk Peserta yang ingin berpartisipasi pada kegiatan ini dipersilahkan untuk mengisi data diri
                        beserta produk dan untuk ketentuan lainnya akan disampaikan admin via Whatsapp apabila ada!</p>
                </div>
                <div class="row gx-lg-0 gy-4">
                    <div class="col-lg-4">
                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    @if (isset($event->desa))
                                        <p>{{ $event->desa }}, {{ $event->kecamatan }}, {{ $event->kota }},
                                            {{ $event->provinsi }} <br>
                                            {{ $event->tempat }}
                                        </p>
                                    @else
                                        <p>-</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->
                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    @if (isset($event->email))
                                        <p>{{ $event->email }}
                                        </p>
                                    @else
                                        <p>-</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telpon:</h4>
                                    @if (isset($event->telp))
                                        <p>{{ $event->telp }}
                                        </p>
                                    @else
                                        <p>-</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Open Hours:</h4>
                                    @if (isset($event->waktu))
                                        <p>{{ $event->waktu }}
                                        </p>
                                    @else
                                        <p>-</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->
                        </div>

                    </div>

                    <div class="col-lg-8 bg-light">
                        <div class="container">
                            <form action="{{ url('beranda/register') }}" method="post">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Nama Peserta" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="usaha" id="usaha"
                                            placeholder="Unit Usaha" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="wa" class="form-control" id="wa"
                                                placeholder="Nomor Whatsapp" required>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <select name="space" id="space" class="form-select" required>
                                                <option selected disabled>pilih</option>
                                                <option value="Bersama peserta lain">Bersama peserta lain</option>
                                                <option value="4 x 4">4 x 4</option>
                                                <option value="4 x 8"> 4 x 8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="alamat" rows="7" placeholder="Alamat" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-5">Kirim Data</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Contact Form -->
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
