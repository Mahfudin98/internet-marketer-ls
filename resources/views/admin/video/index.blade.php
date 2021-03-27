@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <form action="{{ route('video.post') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" placeholder="Title/Judul Video" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select class="custom-select" name="category_id" id="category_id" required>
                                <option value="">Silahkan Pilih</option>
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">Url Video</label>
                            <input type="text" id="url" placeholder="URl video" name="url" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Video</label>
                            <textarea name="description" placeholder="Deskripsi Video" id="description" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select" name="status" id="status" required>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Video</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('video.index') }}" method="GET">
                        <div class="input-group col-sm-4 float-right">
                            <input type="text" class="form-control" placeholder="Cari Title" name="q" value="{{ request()->q }}" aria-label="Cari Nama" aria-describedby="button-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Kategori</th>
                                <th>Url Video</th>
                                <th>Deskripsi Video</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($video as $index => $row)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->category->name }}</td>
                                    <td><a href="{{ $row->url }}" target="_blank" rel="noopener noreferrer">{{ $row->url }}</a></td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                        @else
                                        <span class="badge badge-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('video.delete', $row->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#video{{ $row->id }}"><i class="fas fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {!! $video->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</main>
@foreach ($video as $row)
  <div class="modal fade" id="video{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('video.update', $row->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" value="{{ $row->title }}" placeholder="Title/Judul Video" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select class="custom-select" name="category_id" id="category_id" required>
                        <option value="">Silahkan Pilih</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $row->category_id ? 'selected':'' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">Url Video</label>
                    <input type="text" id="url" value="{{ $row->url }}" placeholder="URl video" name="url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Video</label>
                    <textarea name="description" placeholder="Deskripsi Video" id="description" class="form-control" cols="30" rows="10" required>{{ $row->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status" id="status" required>
                        <option value="1" {{ $row->status == 1 ? 'selected':'' }}>Aktif</option>
                        <option value="0" {{ $row->status == 0 ? 'selected':'' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endforeach
@stop
