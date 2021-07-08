<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Category;
use App\Models\Province;
use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $province = Province::with(['district.anggota'])->orderBy('created_at', 'desc')->get();
        $agen = Anggota::with(['district'])->orderBy('created_at', 'desc');
        $agen = $agen->where('type', 'Agen')->get();
        // dd($province[0]->city[0]->district[0]->anggota);
        return view('guest.listagenreseller', compact('province', 'agen'));
    }

    public function list()
    {
        $video = Video::with(['category'])->where('status', 1)->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $video = $video->where('title', 'LIKE', '%' . request()->q . '%');
        }
        $video = $video->paginate(10);
        $kategori = Category::all();

        return view('anggota.dashboard', compact('video', 'kategori'));
    }
}
