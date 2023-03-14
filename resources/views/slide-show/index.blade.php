@extends('templates.layouts')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Gambar</h2>
                <a href="{{ route('slide-show.create') }}" class="btn btn-primary float-right"><i
                        class="fa fa-plus-circle mr-2"></i>Slide</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive text-center">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Gambars</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($img as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/img/' . $item->gambar) }}" alt=""
                                                    width="150px">
                                            </td>
                                            <td>
                                                @if ($item->status === 'aktif')
                                                    <span class="badge badge-success">
                                                        {{ $item->status }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning">
                                                        {{ $item->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('slide-show.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-power-off"></i></a>
                                                <form action="{{ route('slide-show.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
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
