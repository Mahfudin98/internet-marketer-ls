@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Anggota</h1>
@stop

@section('content')
<main>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Anggota</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                          <label class="custom-file-label" for="inputGroupFile01" id="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Nomor HP/Whataspp</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Nomor HP Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputGroupSelect01">Tipe Anggota</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">Tipe</label>
                                        </div>
                                        <select class="custom-select" name="type" id="inputGroupSelect01" required>
                                          <option selected>Pilih Tipe</option>
                                          <option value="Agen">Agen</option>
                                          <option value="Reseller">Reseller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="custom-select" name="status" id="status" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-user-plus"></i> Add Anggota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("inputGroupFile01").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
@stop
