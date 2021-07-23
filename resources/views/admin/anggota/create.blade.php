@extends('adminlte::page')

@section('title', 'Create Member')

@section('content_header')
    <h1 class="m-0 text-dark">Create Member</h1>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username Anggota" required>
                                    <p><small>*Username harus unique, contoh: <strong>reseller123</strong></small></p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP/Whataspp</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Nomor HP Anggota" required>
                                    <p><small>*Nomor hp dimulai dari 08 bukan 62/+62. contoh: <strong>081234567890</strong></small></p>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link CTA*</label>
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Link Rotator">
                                    <p><small>*Masukan link CTA jika ada</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="province_id">Provinsi</label>
                                    <select class="form-control" name="province_id" id="province_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Provinsi" required>
                                      <option value="">Pilih Propinsi</option>
                                      @foreach ($provinces as $row)
                                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                                      @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                  </div>
                                <div class="form-group">
                                    <label class="form-label" for="city_id">Kabupaten</label>
                                    <select class="form-control" name="city_id" id="city_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Kabupaten" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="district_id">Kecamatan</label>
                                    <select class="form-control" name="district_id" id="district_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('district_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Anggota</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                          <label class="custom-file-label" for="inputGroupFile01" id="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <p><strong>*Kosongkan jika tidak ada foto</strong></p>
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

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script type="text/javascript">
    $('#province_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: { province_id: $(this).val() },
            success: function(html){
                $('#city_id').empty()
                $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                $.each(html.data, function(key, item) {
                    $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: $(this).val() },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: $(this).val() },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
    $('#district_id').on('change', function() {
        $('#metode').empty()
        $('#metode').append('<option value="">Loading...</option>')
        $.ajax({
            success: function(html){
                $('#metode').empty()
                $('#metode').append('<option value="">Pilih Metode</option>')
                $('#metode').append(`
                        <option value="tf">Transfer</option>
                        <option value="cod">COD</option>
                    `)
            }
        });
    })
    $('#metode').on('change', function() {
        $('#courier').empty()
        $('#courier').append('<option value="">Loading...</option>')
        $.ajax({
            success: function(html){
                var metode = $('select[name=metode]').val()
                $('#courier').empty()
                $('#courier').append('<option value="">Pilih Kurir</option>')
                if (metode == 'tf') {
                    $('#courier').append(`
                        <option value="jne">JNE</option>
                        <option value="jnt">JNT</option>
                        <option value="anteraja">Anter Aja</option>
                    `)
                } else {
                    $('#courier').append(`
                        <option value="jnt">JNT</option>
                    `)
                }
            }
        });
    })
</script>
@endsection
