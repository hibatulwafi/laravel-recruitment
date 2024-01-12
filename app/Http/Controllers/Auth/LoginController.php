<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user =  Auth::user();
            if ($user->type == '1') {
                // return redirect()->intended('admin');
                dd('admin');
            } else if ($user->type == '0') {
                // return redirect()->intended('user');
                dd('rakjel');
            }
            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        return redirect('career/login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/career/login');
    }
}
