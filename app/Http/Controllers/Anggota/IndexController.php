<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Category;
use App\Models\MemberProduct;
use App\Models\Product;
use App\Models\Province;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function agenreseller()
    {
        $province = Province::with(['district.anggota'])->orderBy('created_at', 'desc')->get();
        $agen = Anggota::with(['district'])->orderBy('created_at', 'desc');
        $agen = $agen->where('type', 'Agen')->get();
        // dd($province[0]->city[0]->district[0]->anggota);
        return view('guest.listagenreseller', compact('province', 'agen'));
    }

    public function index()
    {
        return view('anggota.dashboard');
    }

    public function product()
    {
        $product = Product::orderBy('DESC')->paginate(10);
        $member = MemberProduct::with('product')->orderBy('DESC')->paginate(10);
        return view('anggota.produk.produk', compact('product', 'member'));
    }

    public function stock()
    {
        return view('anggota.produk.stock');
    }
}
