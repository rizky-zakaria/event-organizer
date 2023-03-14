@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form action="{{ route('slide-show.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="x_title">
                    <h2>Form Gambar</h2>
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save mr-2"></i>Simpan</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="gambar"
                                class="custom-file-input @error('gambar')
                                is-invalid
                            @enderror"
                                id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    @error('gambar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
