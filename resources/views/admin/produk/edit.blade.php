@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Anggota</h1>
@stop

@section('content')
<main>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Produk</h3>
                </div>
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Produk</label>
                            <input type="file" name="image" class="form-control">
                            @if ($product->image != null)
                            <p>Biarkan kosong jika tidak ingin mengganti Foto.</p>
                            <img src="{{ url('/storage/product/'.$product->image) }}" width="100px" height="auto" alt="{{ $product->image }}">
                            @else

                            @endif
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe Produk</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="">Pilih Type</option>
                                <option value="0" {{ $product->type == 0 ? 'selected':'' }}>Paket</option>
                                <option value="1" {{ $product->type == 1 ? 'selected':'' }}>Ecer</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
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
