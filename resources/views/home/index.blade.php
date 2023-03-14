@extends('templates.layouts')
@section('content')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <span>
                        <i class="fa fa-user"></i>
                        Petugas
                    </span>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">
                        {{ $petugas }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-light">
                    <span>
                        <i class="fa fa-users"></i>
                        Peserta
                    </span>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">
                        {{ $petugas }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-light">
                    <span>
                        <i class="fa fa-calendar"></i>
                        Event
                    </span>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">
                        {{ $petugas }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card p-3">
                <h3>Hai, <b>{{ Auth::user()->name }}</b>!</h3>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
@endsection
