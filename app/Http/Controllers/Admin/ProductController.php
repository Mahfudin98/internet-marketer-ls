<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $product = $product->paginate(10);
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

    public function destroy($id)
    {
        $product = Product::find($id);
        $member = MemberProduct::where('product_id', $product->id);
        File::delete(storage_path('app/public/product/' . $product->image));
        $member->delete();
        $product->delete();
        return redirect(route('product.index'))->with(['success' => 'Product Berhasil diHapus']);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.produk.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:100',
            'type'        => 'required',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $product = Product::find($id);
        $data = $request->only('name', 'type', 'image');
        $filename = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/product', $filename);
            File::delete(storage_path('app/public/product/' . $product->image));
        }
        if ($request->image != '') {
            $data['image'] = $filename;
        }
        $product->update($data);

        return redirect(route('product.index'))->with(['success' => 'Product Berhasil diUpdate']);
    }
}
