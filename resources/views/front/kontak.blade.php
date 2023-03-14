@extends('templates.front')
@section('content')
    <section id="hero" class="hero">
        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-whatsapp"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->nama))
                                    {{ $event->nama }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-telephone"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->waktu))
                                    {{ $event->waktu }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-telegram"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->tempat))
                                    {{ $event->tempat }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-envelope"></i></div>
                            <h4 class="title text-light">
                                @if (isset($event->penyelenggara))
                                    {{ $event->penyelenggara }}
                                @else
                                    -
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
