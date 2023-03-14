@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form action="{{ route('pengguna.store') }}" method="post">
                @csrf
                <div class="x_title">
                    <h2>Daftar Petugas Pelaksana</h2>
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i>
                        Simpan</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="notelp">Nomor Telpon</label>
                            <input type="text" name="notelp" id="notelp" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
