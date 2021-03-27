<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        $video = Video::orderBy('created_at', 'desc');
        if (request()->q != '') {
            $video = $video->where('title', 'LIKE', '%' . request()->q . '%');
        }
        $video = $video->paginate(10);
        return view('admin.video.index', compact('kategori', 'video'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string|max:100',
            'category_id' => 'required',
            'url' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        Video::create([
            'title' => $request->title,
            'slug' => $request->title,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect(route('video.index'))->with(['success' => 'Video Baru Ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $video->update([
            'title' => $request->title,
            'slug' => $request->title,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect(route('video.index'))->with(['success' => 'Video Berhasil diUpdate']);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect(route('video.index'))->with(['success' => 'Video Berhasil diHapus']);
    }
}
