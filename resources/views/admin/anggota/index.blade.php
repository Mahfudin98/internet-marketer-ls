@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Anggota</h1>
@stop

@section('content')
<main>
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('anggota.create') }}" class="btn btn-primary"><i class="nav-icon fas fa-user-plus"></i> Add Anggota</a>
                    <form action="{{ route('anggota.index') }}" method="GET">
                        <div class="input-group col-sm-4 float-right">
                            <input type="text" class="form-control" placeholder="Cari Nama" name="q" value="{{ request()->q }}" aria-label="Cari Nama" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kecamatan</th>
                                <th>Phone/Link CTA</th>
                                <th>Alamat</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($anggota as $row)
                                <tr>
                                    <td>
                                        @if ($row->image != null)
                                            <img src="{{ url('/storage/anggota/'.$row->image) }}" width="100px" height="auto" alt="{{ $row->image }}">
                                        @else
                                            <img src="{{ asset('img/logo-ls.png') }}" width="100px" height="auto" alt="{{ $row->image }}">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $row->name }}
                                        {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                            {{ $row->name }}
                                        </button> --}}
                                    </td>
                                    <td>{{ $row->district->name }}</td>
                                    <td>
                                        @if ($row->link != null)
                                            <a href="{{ $row->link }}">Cek Link disini!</a>
                                        @else
                                        {{ preg_replace("/^62/", "0", $row->phone) }}
                                        @endif
                                    </td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>
                                        @if ($row->type == 'Agen')
                                        <span class="badge badge-success">Agen</span>
                                        @else
                                        <span class="badge badge-primary">Reseller</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                        @else
                                        <span class="badge badge-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('anggota.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('anggota.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</main>

  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
@stop
