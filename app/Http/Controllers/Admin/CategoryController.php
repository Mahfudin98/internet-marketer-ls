<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'type'  => 'required'
        ]);

        $kategori =  Category::create([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect(route('category.index'))->with(['success' => 'Kategori Baru Ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'type' => 'required'
        ]);

        $kategori =  Category::find($id);
        $kategori->update([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect(route('category.index'))->with(['success' => 'Kategori Berhasil diUpdate']);
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);
        $kategori->delete();
        return redirect(route('category.index'))->with(['success' => 'Kategori Berhasil diHapus']);
    }
}
