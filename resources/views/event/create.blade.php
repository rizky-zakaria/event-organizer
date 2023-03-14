@extends('templates.layouts')
@section('content')
    <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="banner">Banner</label>
                        <input type="file" name="banner" id="banner" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option selected disabled>Pilih</option>
                            @foreach ($kat as $item)
                                <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="hari">Hari</label>
                        <input type="text" name="hari" id="hari" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="jam">Jam</label>
                        <input type="text" name="jam" id="jam" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="desa">Kelurahan / Desa</label>
                        <input type="text" name="desa" id="desa" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="kota">Kabupaten / Kota</label>
                        <input type="text" name="kota" id="kota" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="tempat">Tempat</label>
                        <textarea name="tempat" id="tempat" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="petugas">Petugas Pelaksana</label>
                        <select name="petugas" id="petugas" class="form-control">
                            <option selected disabled>Pilih</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
