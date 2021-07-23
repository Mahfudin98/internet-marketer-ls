<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with(['district'])->orderBy('created_at', 'desc');
        if (request()->q != '') {
            $anggota = $anggota->where('name', 'LIKE', '%' . request()->q . '%');
        }
        $anggota = $anggota->paginate(10);
        $sosmed = Sosmed::with(['anggota'])->first();

        return view('admin.anggota.index', compact('anggota', 'sosmed'));
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
            'image'       => 'nullable|image|mimes:png,jpeg,jpg',
            'username'    => 'required|unique:anggotas|max:255',
            'password'    => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/anggota', $filename);

            $anggota =  Anggota::create([
                'name' => $request->name,
                'slug' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
                'district_id' => $request->district_id,
                'alamat' => $request->alamat,
                'phone' => preg_replace("/^0/", "62", $request->phone),
                'link'  => $request->link,
                'image' => $filename,
                'type' => $request->type,
                'status' => $request->status
            ]);

            $sosmed = Sosmed::create([
                'anggota_id' => $anggota->id,
                'facebook' => $request->fb,
                'instagram' => $request->ig,
                'tiktok' => $request->tt,
                'shopee' => $request->shopee,
            ]);
        } else {
            $anggota =  Anggota::create([
                'name' => $request->name,
                'slug' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
                'district_id' => $request->district_id,
                'alamat' => $request->alamat,
                'phone' => preg_replace("/^0/", "62", $request->phone),
                'link'  => $request->link,
                'type' => $request->type,
                'status' => $request->status
            ]);
            $sosmed = Sosmed::create([
                'anggota_id' => $anggota->id,
                'facebook' => $request->fb,
                'instagram' => $request->ig,
                'tiktok' => $request->tt,
                'shopee' => $request->shopee,
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
            'username'    => 'required|unique:anggotas|max:255',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $anggota = Anggota::find($id);
        $data = $request->only('name', 'district_id', 'username', 'password', 'slug', 'alamat', 'phone', 'link', 'image', 'type', 'status');
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

        if ($request->phone != '') {
            $data['phone'] = preg_replace("/^0/", "62", $request->phone);
        }

        if ($request->district_id != '') {
            $data['district_id'] = $request->district_id;
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
        $sosmed = Sosmed::where('anggota_id', $anggota->id);
        File::delete(storage_path('app/public/anggota/' . $anggota->image));
        $sosmed->delete();
        $anggota->delete();
        return redirect(route('anggota.index'))->with(['success' => 'Anggota Berhasil diHapus']);
    }

    public function sosmed($id)
    {
        $anggota = Anggota::find($id);
        return view('admin.anggota.sosmed', compact('anggota'));
    }

    public function postSosmed(Request $request)
    {
        $this->validate($request, [
            'anggota_id' => 'required'
        ]);
        $sosmed = Sosmed::create([
            'anggota_id' => $request->anggota_id,
            'facebook' => $request->fb,
            'instagram' => $request->ig,
            'tiktok' => $request->tt,
            'shopee' => $request->shopee,
        ]);

        return redirect(route('anggota.index'))->with(['success' => 'Sosmed berhasil ditambahkan']);
    }
}
