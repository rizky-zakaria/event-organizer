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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/img/' . $item->logo) }}" alt=""
                                                    width="100px">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->penyelenggara }}</td>
                                            <td>{{ $item->waktu }}</td>
                                            <td>{{ $item->tempat }}</td>
                                            <td>
                                                @if ($item->status === 'aktif')
                                                    <span class="badge badge-success">{{ $item->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success btn-sm"><i
                                                        class="fa fa-edit"></i></a>
                                                @if ($item->status === 'non-aktif')
                                                    <a href="{{ route('event.on', $item->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-power-off"></i></a>
                                                @else
                                                    <a href="{{ route('event.off', $item->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-power-off"></i></a>
                                                @endif

                                                <form action="{{ route('event.destroy', $item->id) }}" method="post">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
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
