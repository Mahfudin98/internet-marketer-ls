@extends('adminlte::page')

@section('title', 'User Setting')

@section('content_header')
    <h1 class="m-0 text-dark">User Setting</h1>
@stop

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama User" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                        <div class="input-group-prepend">
                                        <a class="input-group-text" id="basic-addon1" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select class="custom-select" name="roles" id="roles" required>
                                <option value="">Pilih Roles</option>
                                <option value="admin">Admin</option>
                                <option value="adv">ADV</option>
                                <option value="cs">CS</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Add User</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($user as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @if ($row->roles == 'admin')
                                        <span class="badge badge-success">Admin</span>
                                        @elseif ($row->roles == 'adv')
                                        <span class="badge badge-primary">ADV</span>
                                        @elseif ($row->roles == 'cs')
                                        <span class="badge badge-warning">CS</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('video.delete', $row->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#user{{ $row->id }}"><i class="fas fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
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
@foreach ($user as $row)
  <div class="modal fade" id="user{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('user.update', $row->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" value="{{ $row->name }}" name="name" class="form-control" placeholder="Masukan Nama User" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="{{ $row->email }}" name="email" class="form-control" placeholder="Masukan Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select class="custom-select" name="roles" id="roles" required>
                        <option value="">Pilih Roles</option>
                        <option value="admin" {{ $row->roles == 'admin' ? 'selected':'' }}>Admin</option>
                        <option value="adv" {{ $row->roles == 'adv' ? 'selected':'' }}>ADV</option>
                        <option value="cs" {{ $row->roles == 'cs' ? 'selected':'' }}>CS</option>
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

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
@endsection
