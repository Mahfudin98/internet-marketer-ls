<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\MemberProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $member = Anggota::with(['member'])->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $member = $member->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $member = $member->paginate(10);
        $data = [];
        foreach ($member as $row) {
            $data['labels'][] = $row->name;
            foreach ($row->member as $rows) {
                $data['bar'][] = [
                    'nama' => $rows->anggota->name,
                    'product' => $rows->name_products,
                    'stok' => $rows->stok,
                ];
            }
            $data['sum'][] = $row->member->sum('stok');
        }
        $data['chart_data'] = json_encode($data);
        // dd($bar,$data);
        return view('admin.dashboard', $data, compact('member'));
    }

    // public function stok($id)
    // {
    //     $member = MemberProduct::with('product')->where('anggota_id', $id)->get();
    //     return view('admin.produk.stok', compact('member'));
    // }
}
