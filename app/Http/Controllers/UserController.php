<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->with(['anggota'])->paginate(10);
        return view('admin.users.index', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);

        return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'nullable',
            'roles' => 'required'
        ]);

        $user = User::find($id);
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'roles' => $request->roles,
        ]);

        return redirect(route('user.index'))->with(['success' => 'User Berhasil diUpdate']);
    }
}
