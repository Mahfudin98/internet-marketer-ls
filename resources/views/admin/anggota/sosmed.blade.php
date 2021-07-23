@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Sosmed</h1>
@stop

@section('content')
<main>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('anggota.post.sosmed') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="anggota_id" value="{{ $anggota->id }}" required>
                                <div class="form-group">
                                    <label for="fb">Facebook</label>
                                    <input type="text" class="form-control" name="fb" id="fb" placeholder="Link Facebook">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="ig">Instagram</label>
                                    <input type="text" class="form-control" name="ig" id="ig" placeholder="Link Instagram">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tt">Tik Tok</label>
                                    <input type="text" class="form-control" name="tt" id="tt" placeholder="Link Tik Tok">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="shopee">Shopee</label>
                                    <input type="text" class="form-control" name="shopee" id="shopee" placeholder="Link Shopee">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-user-plus"></i> Add Sosmed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
