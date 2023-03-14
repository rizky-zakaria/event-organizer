@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form action="{{ route('kontak.store') }}" method="post">
                @csrf
                <div class="x_title">
                    <h2>Tambah Kontak</h2>
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save mr-2"></i>Simpan</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="wa">Whatsapp</label>
                            <input type="text" name="wa" id="wa" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="telp">Telpon</label>
                            <input type="text" name="telp" id="telp" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="tg">Telegram</label>
                            <input type="text" name="tg" id="tg" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="fb">Facebook</label>
                            <input type="text" name="fb" id="fb" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="tweeter">Tweeter</label>
                            <input type="text" name="tweeter" id="tweeter" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="ig">Instagram</label>
                            <input type="text" name="ig" id="ig" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
