@extends('templates.front')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Blog</h2>
                            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                                consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                                sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 posts-list">
                    @foreach ($data as $item)
                        <div class="col-xl-4 col-md-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('uploads/img/' . $item->gambar) }}" alt="" class="img-fluid">
                                </div>
                                <h2 class="title">
                                    <a href="blog-details.html">{{ $item->judul }}</a>
                                </h2>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-6.jpg" alt=""
                                        class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <div class="">
                                            <center>
                                                <p class="post-author-list">{{ $item->name }}</p>
                                                <p class="post-date">
                                                    <time datetime="2022-01-01">{{ $item->created_at }}</time>
                                                </p>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div><!-- End post list item -->

            </div><!-- End blog posts list -->

            {{-- <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div> --}}
            {{-- Halaman : {{ $data->currentPage() }} <br />
            Jumlah Data : {{ $data->total() }} <br />
            Data Per Halaman : {{ $data->perPage() }} <br /> --}}
            <br>
            {{ $data->links() }}
            <!-- End blog pagination -->

            {{-- </div> --}}
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
