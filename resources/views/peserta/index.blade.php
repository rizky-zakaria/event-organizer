@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Peserta</h2>
                {{-- <a href="" class="btn btn-primary float-right"><i class="fa fa-plus-circle mr-2"></i>Event</a> --}}
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>WA</th>
                                        <th>Alamat</th>
                                        <th>Spaceboot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->perusahaan }}</td>
                                            <td>{{ $item->wa }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->space_boot }}</td>
                                            <td>
                                                <a href="" class="btn btn-secondary btn-sm">no action</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
