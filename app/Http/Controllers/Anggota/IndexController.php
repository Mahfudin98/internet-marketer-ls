<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('anggota.welcome');
    }

    public function list()
    {
        $video = Video::with(['category'])->where('status', 1)->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $video = $video->where('title', 'LIKE', '%' . request()->q . '%');
        }
        $video = $video->paginate(10);
        $kategori = Category::all();

        return view('anggota.list', compact('video', 'kategori'));
    }
}
