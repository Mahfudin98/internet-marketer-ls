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
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $anggota->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ $anggota->username }}" required>
                                    <p><small>*Username harus unique, contoh: <strong>reseller123</strong></small></p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Anggota">
                                    <p><small>*Kosongkan jika tidak ingin mengganti</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP/Whataspp</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ preg_replace("/^62/", "0", $anggota->phone) }}" required>
                                    <p><small>*Nomor hp dimulai dari 08 bukan 62/+62. contoh: <strong>081234567890</strong></small></p>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link CTA*</label>
                                    <input type="text" class="form-control" name="link" id="link" value="{{ $anggota->link }}" placeholder="Link Rotator">
                                    <p><small>*Masukan link CTA jika ada</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fb">Facebook</label>
                                    <input type="text" class="form-control" name="fb" id="fb" placeholder="Link Facebook" value="{{ $sosmed->facebook }}">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="ig">Instagram</label>
                                    <input type="text" class="form-control" name="ig" id="ig" placeholder="Link Instagram" value="{{ $sosmed->instagram }}">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="tt">Tik Tok</label>
                                    <input type="text" class="form-control" name="tt" id="tt" placeholder="Link Tik Tok" value="{{ $sosmed->tiktok }}">
                                    <p><small>*Kosongkan jika tidak ada</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="shopee">Shopee</label>
                                    <input type="text" class="form-control" name="shopee" id="shopee" placeholder="Link Shopee" value="{{ $sosmed->shopee }}">
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
                                          <option value="Agen" {{ $anggota->type == 'Agen' ? 'selected':'' }}>Agen</option>
                                          <option value="Reseller" {{ $anggota->type == 'Reseller' ? 'selected':'' }}>Reseller</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="province_id">Provinsi</label>
                                    <select class="form-control" name="province_id" id="province_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Provinsi">
                                      <option value="">Pilih Propinsi</option>
                                      @foreach ($provinces as $row)
                                      <option value="{{ $row->id }}" {{ $anggota->district->province_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                      @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                  </div>
                                <div class="form-group">
                                    <label class="form-label" for="city_id">Kabupaten</label>
                                    <select class="form-control" name="city_id" id="city_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Kabupaten">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="district_id">Kecamatan</label>
                                    <select class="form-control" name="district_id" id="district_id" data-width="fit" data-style="form-control form-control-lg" data-title="Pilih Kecamatan">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('district_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $anggota->alamat }}" id="alamat" placeholder="Alamat Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Anggota</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                          <label class="custom-file-label" for="inputGroupFile01" id="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <p>Biarkan kosong jika tidak ingin mengganti Foto.</p>
                                    <img src="{{ url('/storage/anggota/'.$anggota->image) }}" width="100px" height="auto" alt="{{ $anggota->image }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="custom-select" name="status" id="status" required>
                                        <option value="1" {{ $anggota->status == 1 ? 'selected':'' }}>Aktif</option>
                                        <option value="0" {{ $anggota->status == 0 ? 'selected':'' }}>Nonaktif</option>
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
    $(document).ready(function(){
        loadCity($('#province_id').val(), 'bySelect').then(() => {
            loadDistrict($('#city_id').val(), 'bySelect');
        })
    })
    $('#province_id').on('change', function() {
        loadCity($(this).val(), '');
    })
    $('#city_id').on('change', function() {
        loadDistrict($(this).val(), '')
    })
    function loadCity(province_id, type) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: province_id },
                success: function(html){
                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        let city_selected = {{ $anggota->district->city_id }};
                        let selected = type == 'bySelect' && city_selected == item.id ? 'selected':'';
                        $('#city_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                        resolve()
                    })
                }
            });
        })
    }
    function loadDistrict(city_id, type) {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: city_id },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    let district_selected = {{ $anggota->district->id }};
                    let selected = type == 'bySelect' && district_selected == item.id ? 'selected':'';
                    $('#district_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                })
            }
        });
    }
</script>
@endsection
