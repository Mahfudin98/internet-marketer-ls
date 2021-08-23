<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Category;
use App\Models\MemberProduct;
use App\Models\Product;
use App\Models\Province;
use App\Models\Sosmed;
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
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with(['product'])->orderBy('created_at','DESC');
        if (request()->q != '') {
            $memberprod = $memberprod->where('name_products', 'LIKE', '%' . request()->q . '%');
        }
        $points = Sosmed::with(['anggota'])->orderBy('point', 'DESC')->paginate(10);
        $mamberpoint = Sosmed::where('anggota_id', $member->id)->first();
        $memberprod = $memberprod->get();
        $data = [];
        foreach ($memberprod as $row) {
            $data['label'][] = $row->product->name;
            $data['stok'][] = $row->stok;
        }

        foreach ($points as $row) {
            $data['anggota'][] = $row->anggota->name;
            $data['point'][] = $row->point;
        }

        $data['chart_data'] = json_encode($data);
        // dd($points);
        return view('anggota.dashboard', $data, compact('memberprod', 'mamberpoint'));
    }

    public function product()
    {
        $product = Product::orderBy('created_at','DESC');
        if (request()->q != '') {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $product = $product->get();
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
            if ($request->is('product_id') == DB::select('select * from member_products where anggota_id ='.$member->id.' and product_id ='.$request->product_id)) {
                MemberProduct::create([
                    'anggota_id' => $member->id,
                    'name_products' => $request->name,
                    'product_id' => $request->product_id,
                    'stok' => 0,
                    'status' => 1
                ]);

                return back()->with(['success' => ' Produk Baru Ditambahkan']);
            } else {
                return back()->with(['error' => 'Produk sudah ditambahkan']);
            }
        } elseif ($product == null) {
            MemberProduct::create([
                'anggota_id' => $member->id,
                'name_products' => $request->name,
                'product_id' => $request->product_id,
                'stok' => 0,
                'status' => 1
            ]);

            return back()->with(['success' => 'Produk Baru Ditambahkan']);
        }

    }

    public function editProduct()
    {
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with('product')->orderBy('created_at','DESC');
        if (request()->q != '') {
            $memberprod = $memberprod->where('name_products', 'LIKE', '%' . request()->q . '%');
        }
        $memberprod = $memberprod->get();

        return view('anggota.produk.editproduct', compact('memberprod'));
    }

    public function destroyProduct($id)
    {
        $memberprod = MemberProduct::find($id);
        $memberprod->delete();
        return back()->with(['success' => 'Produk telah dihapus']);
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
