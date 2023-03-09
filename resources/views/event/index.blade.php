@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Event</h2>
                <a href="{{ route('event.create') }}" class="btn btn-primary float-right"><i
                        class="fa fa-plus-circle mr-2"></i>Event</a>
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
                                        <th>Logo</th>
                                        <th>Nama</th>
                                        <th>Penyelenggara</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ asset('uploads/img/' . $item->logo) }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->penyelenggara }}</td>
                                            <td>{{ $item->waktu }}</td>
                                            <td>{{ $item->tempat }}</td>
                                            <td>
                                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
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
