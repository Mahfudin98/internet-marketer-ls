<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.produk.index', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:100',
            'type'        => 'required',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/product', $filename);

            $product =  Product::create([
                'name' => $request->name,
                'image' => $filename,
                'type' => $request->type,
            ]);
        }

        return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
    }
}
