<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\MemberProduct;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingAnggotaController extends Controller
{
    public function index()
    {
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with('product')->orderBy('created_at','DESC');
        if (request()->q != '') {
            $memberprod = $memberprod->where('name_products', 'LIKE', '%' . request()->q . '%');
        }
        $memberprod = $memberprod->get();

        return view('anggota.user-setting.user', compact('memberprod'));
    }

    public function edit()
    {
        return view('anggota.user-setting.edit');
    }

    public function member($slug)
    {
        $member = Anggota::with('district')->where('slug', $slug)->first();
        $sosmed = Sosmed::where('anggota_id', $member->id)->first();
        return view('guest.profile', compact('member', 'sosmed'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:100',
            'phone'       => 'required',
            'username'    => 'nullable',
            'password'    => 'nullable',
            'image'       => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $anggota = Anggota::find($id);
        $data = $request->only('name', 'phone', 'username', 'image');
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

        if ($request->password != '') {
            $data['password'] = $request->password;
        }
        $anggota->update($data);

        return redirect(route('member.setting'))->with(['success' => 'Data Berhasil diUpdate']);
    }
}
