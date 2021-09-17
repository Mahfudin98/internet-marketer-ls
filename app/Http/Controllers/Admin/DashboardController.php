<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\MemberProduct;
use App\Models\Product;
use App\Models\Sosmed;
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
        $points = Anggota::with(['sosmeds'])->orderBy('updated_at', 'ASC');
        if (request()->q != '') {
            $points = $points->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $points = $points->paginate(10);
        $rank = Sosmed::with(['anggota'])->orderBy('point', 'DESC')->get();
        $rankChart = Sosmed::with(['anggota'])->orderBy('point', 'DESC')->paginate(10);
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

        foreach ($rankChart as $row) {
            $data['anggota'][] = $row->anggota->name;
            $data['point'][] = $row->point;
        }

        $data['chart_data'] = json_encode($data);

        // dd($data);
        return view('admin.dashboard', $data, compact('member', 'points', 'rank'));
    }

    public function updatePoint(Request $request, $id)
    {
        $data = $request->all();
        $points = Sosmed::find($id);
        $points->update($data);
        return redirect(route('dashboard'))->with(['success' => 'Point Ditambahkan']);
    }
    // public function stok($id)
    // {
    //     $member = MemberProduct::with('product')->where('anggota_id', $id)->get();
    //     return view('admin.produk.stok', compact('member'));
    // }
}
