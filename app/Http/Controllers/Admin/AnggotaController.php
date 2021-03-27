<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::orderBy('created_at', 'desc');
        if (request()->q != '') {
            $anggota = $anggota->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $anggota = $anggota->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            'username' => 'required|string|max:255|unique:anggotas',
            'alamat'   => 'required',
            'phone'    => 'required',
            'password' => 'required',
            'type'     => 'required',
            'status'   => 'required',
            'image'    => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/anggota', $filename);

            $anggota =  Anggota::create([
                'name' => $request->name,
                'slug' => $request->name,
                'username' => $request->username,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'password' => $request->password,
                'image' => $filename,
                'type' => $request->type,
                'status' => $request->status
            ]);

            return redirect(route('anggota.index'))->with(['success' => 'Anggota Baru Ditambahkan']);
        }
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:100',
            // 'username' => 'required|string|max:255|unique:anggotas',
            'alamat'   => 'required',
            'phone'    => 'required',
            'password' => 'nullable',
            'type'     => 'required',
            'status'   => 'required',
            'image'    => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $anggota = Anggota::find($id);
        $data = $request->only('name', 'slug', 'alamat', 'phone','image', 'type', 'status');
        $filename = $anggota->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/anggota', $filename);
            File::delete(storage_path('app/public/anggota/' . $anggota->image));
        }
        if ($request->image != '') {
            $data['image'] = $filename;
        }

        if ($request->password != '') {
            $data['password'] = $request->password;
        }
        $anggota->update($data);

        return redirect(route('anggota.index'))->with(['success' => 'Anggota Berhasil diUpdate']);
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        File::delete(storage_path('app/public/anggota/' . $anggota->image));

        $anggota->delete();
        return redirect(route('anggota.index'))->with(['success' => 'Anggota Berhasil diHapus']);
    }
}
