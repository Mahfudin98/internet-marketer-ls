@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Kategori</h1>
@stop

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <form action="{{ route('category.post') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="custom-select" name="type" id="type" required>
                                <option value="">Silahkan Pilih</option>
                                <option value="1">Agen</option>
                                <option value="0">Reseller</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Add Kategori</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                            <th>Type</th>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>
                                    @if ($row->type == 1)
                                    <span class="badge badge-success">Agen</span>
                                    @else
                                    <span class="badge badge-primary">Reseller</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#category{{ $row->id }}"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

  <!-- Modal -->
  @foreach ($kategori as $row)
  <div class="modal fade" id="category{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('category.update', $row->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="name" value="{{ $row->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="custom-select" name="type" id="type" required>
                            <option value="1" {{ $row->type == 1 ? 'selected':'' }}>Agen</option>
                            <option value="0" {{ $row->type == 0 ? 'selected':'' }}>Reseller</option>
                        </select>
                    </div>
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
