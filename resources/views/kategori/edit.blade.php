@extends('templates.layouts')
@section('content')
    <form action="{{ route('kategori.update', $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control"
                            value="{{ $data->kategori }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
