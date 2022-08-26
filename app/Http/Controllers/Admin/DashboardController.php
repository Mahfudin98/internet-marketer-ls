<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PointExcel;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\MemberProduct;
use App\Models\Product;
use App\Models\Sosmed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $amount = Anggota::all();
        $now = Carbon::now()->format('m');

        $newMember = Anggota::whereRaw('MONTH(join_on) = ' . $now)->get();

        $data = [];
        foreach ($amount as $row) {
            $data['resellerAktif'] = $row->where('type', 'Reseller')->where('status', '1')->count();
            $data['resellerNoAktif'] = $row->where('type', 'Reseller')->where('status', '0')->count();
            $data['agenAktif'] = $row->where('type', 'Agen')->where('status', '1')->count();
            $data['agenNoAktif'] = $row->where('type', 'Agen')->where('status', '0')->count();
        }

        $data['labels'] = ['Reseller Aktif', 'Reseller Tidak Aktif', 'Agen Aktif', 'Agen Tidak Aktif'];

        $data['chart_data'] = json_encode($data);

        // dd($data);

        return view('admin.dashboard', $data, compact('amount', 'newMember'));
    }

    public function barReseller()
    {
        // chart
        $year = request()->year;
        $mounth = request()->month;
        $filter = $year . '-' . $mounth;
        $parse = Carbon::parse($filter);
        $array_date = range(
            $parse->startOfMonth()->format('d'),
            $parse->endOfMonth()->format('d')
        );

        $reseller = Anggota::where('join_on', 'LIKE', '%' . $filter . '%')
        ->where('type', 'Reseller')
        ->groupBy('date')
        ->orderBy('join_on')
        ->selectRaw('DATE(join_on) as date')
        ->selectRaw('count(*) as count')
        ->get();
        // $dates = $dates->merge($reseller);
        $agen = Anggota::where('join_on', 'LIKE', '%' . $filter . '%')
        ->where('type', 'Agen')
        ->groupBy('date')
        ->orderBy('join_on')
        ->selectRaw('DATE(join_on) as date')
        ->selectRaw('count(*) as count')
        ->get();

        $data = [];
        foreach ($array_date as $row) {
            $f_date = strlen($row) == 1 ? 0 . $row : $row;
            $date = $filter . '-' . $f_date;
            // reseller
            $resellers = $reseller->firstWhere('date', $date);
            $data['reseller'][] = [
                'labels' => $date,
                'total' => $resellers ? $resellers->count : 0,
            ];
            // agen
            $agens = $agen->firstWhere('date', $date);
            $data['agen'][] = [
                'labels' => $date,
                'total' => $agens ? $agens->count : 0,
            ];
        }

        // $data['chart_data'] = json_encode($data);
        // dd($data);
        return $data;
    }

    public function point()
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
        return view('admin.point', $data, compact('member', 'points', 'rank'));
        // dd($newMember);
    }

    public function exportExcel()
    {
        return Excel::download(new PointExcel, 'point.xlsx');
    }

    public function exportPdf()
    {
        $bulan = Carbon::now();
        $rank = Sosmed::with(['anggota'])->orderBy('point', 'DESC')->get();
        $pdf = PDF::loadView('admin.rank-pdf', compact('rank', 'bulan'));
        return $pdf->stream();
    }

    public function updatePoint(Request $request, $id)
    {
        $data = $request->all();
        $points = Sosmed::find($id);
        $points->update($data);
        return back()->with(['success' => 'Point Ditambahkan']);
    }
    // public function stok($id)
    // {
    //     $member = MemberProduct::with('product')->where('anggota_id', $id)->get();
    //     return view('admin.produk.stok', compact('member'));
    // }
}
