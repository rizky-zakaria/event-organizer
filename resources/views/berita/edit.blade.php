@extends('templates.layouts')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('berita.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header" style="width: 100%">
                                <button class="btn btn-success float-right">Simpan</button>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    {{-- <img src="{{ asset('uploads/img/' . $data->gambar) }}" width="200px"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                value="{{ $data->gambar }}" aria-describedby="inputGroupFileAddon01"
                                                name="file">
                                            <label class="custom-file-label" for="inputGroupFile01"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Judul"
                                        name="judul" value="{{ $data->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="form-label">Isi</label>
                                    <textarea name="isi" class="my-editor form-control" id="my-editor" cols="30" rows="10">
                                        {{ $data->isi }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
