<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\MemberProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingAnggotaController extends Controller
{
    public function index()
    {
        $member = Auth::guard('member')->user();
        $memberprod = MemberProduct::where('anggota_id', $member->id)->with('product')->orderBy('created_at','DESC')->get();

        return view('anggota.user-setting.user', compact('memberprod'));
    }
}
