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
use Illuminate\Support\Facades\DB;

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
        $product = Product::orderBy('created_at','DESC')->paginate(10);
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with('product')->orderBy('created_at','DESC')->paginate(10);
        return view('anggota.produk.produk', compact('product', 'memberprod'));
        // dd($member);
    }

    public function productStore(Request $request)
    {
        $this->validate($request, [
            'product_id'    => 'required',
        ]);

        $member = Auth::guard('member')->user();
        $product = MemberProduct::where('anggota_id', $member->id)->first();

        if ($product != null) {
            if ($request->is('product_id') == $product->where('product_id', $request->product_id)->first()) {
                MemberProduct::create([
                    'anggota_id' => $member->id,
                    'product_id' => $request->product_id,
                    'stok' => 0,
                    'status' => 1
                ]);

                return back()->with(['success' => 'Produk Baru Ditambahkan']);
            } else {
                return back()->with(['error' => 'Produk sudah ditambahkan']);
            }
        } elseif ($product == null) {
            MemberProduct::create([
                'anggota_id' => $member->id,
                'product_id' => $request->product_id,
                'stok' => 0,
                'status' => 1
            ]);

            return back()->with(['success' => 'Produk Baru Ditambahkan']);
        }

    }

    public function stock()
    {
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with('product')->orderBy('created_at','DESC')->paginate(10);
        return view('anggota.produk.stock', compact('memberprod'));
    }

    public function updateStock(Request $request)
    {
        $this->validate($request, [
            'stock'    => 'required',
        ]);

        $member = Auth::guard('member')->user();
        $prod = MemberProduct::where('anggota_id', $member->id)->get();
        foreach ($prod as $key) {
            $product = MemberProduct::find($key->id);
            $product->stok = $request->stock[$key->id];
            $product->save();
        }

        return back()->with(['success' => 'Stok telah diubah']);
    }
}
