@extends('templates.front')
@section('content')
    <main id="main">
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Galeri</h2>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4 portfolio-container">
                        @foreach ($data as $item)
                            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <a href="{{ asset('uploads/img/' . $item->gambar) }}"
                                        data-gallery="portfolio-gallery-app" class="glightbox"><img
                                            src="{{ asset('uploads/img/' . $item->gambar) }}" class="img-fluid"
                                            alt=""></a>
                                    <div class="portfolio-info">
                                        <p>{{ $item->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    {{ $data->links() }}
                </div>
            </div>
        </section>
    </main>
@endsection
