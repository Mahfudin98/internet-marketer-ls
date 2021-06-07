<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with('district')->orderBy('created_at', 'desc');
        if (request()->q != '') {
            $anggota = $anggota->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $anggota = $anggota->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        return view('admin.anggota.create', compact('provinces'));
    }

    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:100',
            'district_id' => 'required',
            'alamat'      => 'required',
            'phone'       => 'required',
            'type'        => 'required',
            'status'      => 'required',
            'link'        => 'nullable',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/anggota', $filename);

            $anggota =  Anggota::create([
                'name' => $request->name,
                'slug' => $request->name,
                'district_id' => $request->district_id,
                'alamat' => $request->alamat,
                'phone' => preg_replace("/^0/", "62", $request->phone),
                'link'  => $request->link,
                'image' => $filename,
                'type' => $request->type,
                'status' => $request->status
            ]);
        } else {
            $anggota =  Anggota::create([
                'name' => $request->name,
                'slug' => $request->name,
                'district_id' => $request->district_id,
                'alamat' => $request->alamat,
                'phone' => preg_replace("/^0/", "62", $request->phone),
                'link'  => $request->link,
                'type' => $request->type,
                'status' => $request->status
            ]);
        }

        return redirect(route('anggota.index'))->with(['success' => 'Anggota Baru Ditambahkan']);
    }

    public function edit($id)
    {
        $anggota = Anggota::with(['district'])->find($id);
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        return view('admin.anggota.edit', compact('anggota', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:100',
            'district_id' => 'nullable',
            'alamat'      => 'required',
            'phone'       => 'required',
            'type'        => 'required',
            'status'      => 'required',
            'link'        => 'nullable',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $anggota = Anggota::find($id);
        $data = $request->only('name', 'district_id', 'slug', 'alamat', 'phone', 'link', 'image', 'type', 'status');
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

        if ($request->district_id != '') {
            $data['district_id'] = $request->district_id;
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
