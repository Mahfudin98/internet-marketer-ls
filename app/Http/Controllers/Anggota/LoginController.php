<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (auth()->guard('member')->check()) return redirect(route('member.index'));
        return view('anggota.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|string'
        ]);

        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $login = [
            $loginType => $request->username,
            'password' => $request->password
        ];
        $login['status'] = 1;

        if (auth()->guard('member')->attempt($login)) {
            return redirect()->route('member.index');
        }
        return redirect()->back()->with(['error' => 'username/Password Salah']);
    }

    public function logout()
    {
        auth()->guard('member')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
        return redirect(route('member.index'));
    }
}
