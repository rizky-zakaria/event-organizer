@extends('templates.layouts')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-start bg-primary text-light">
            <h5>Profile</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('home.set-gambar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ asset('uploads/img/' . Auth::user()->profile) }}" alt="" width="200px">
                        <input type="file" name="gambar" id="gambar" class="form-control mt-2">
                        <button type="submit" class="mt-1 btn btn-sm btn-success">Upload Gambar</button>
                    </form>
                </div>
                <div class="col-md-9">
                    <form action="{{ route('home.set-profile') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col">
                                <label for="">Telpon</label>
                                <input type="text" name="telpon" id="telpon" class="form-control"
                                    value="{{ Auth::user()->telp }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-2">
        <form action="{{ route('home.set-password') }}" method="post">
            @csrf
            <div class="card-header d-flex justify-content-between bg-warning">
                <h5 class="text-light">Ubah Password</h5>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Password Baru</label>
                        <input type="password" name="old" id="old" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" name="new" id="new" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
