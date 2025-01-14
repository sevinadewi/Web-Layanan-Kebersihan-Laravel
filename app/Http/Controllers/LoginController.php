<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login()
    {
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);

        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect('/admin-dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Login gagal',
        ])->onlyInput('email');
    }

    public function signUp(Request $request)
    {
        try {          
            $credentials = $request->validate([
                'register_name' => ['required', 'string'],
                'register_email' => ['required', 'email'],
                'register_password' => ['required'],
            ], [
                // Pesan error khusus
                'register_name.required' => 'Nama tidak boleh kosong.',
                'register_email.required' => 'Email tidak boleh kosong.',
                'register_email.email' => 'Email tidak valid.',
                'register_password.required' => 'Password tidak boleh kosong.',
            ]);
    
            $user = User::create([
                'name'=>$request->register_name,
                'email'=>$request->register_email,
                'password'=> Hash::make($request->register_password),
            ]);
    
            auth()->login($user);

            $request->session()->flash('success', 'Register berhasil!');
    
            return redirect('/login');
        } catch (\Throwable $th) {
            // dd("oke");
            // return back()->withErrors([
            //     'email' => 'Login gagal',
            // ])->onlyInput('email');


              // Flash message untuk gagal
        $request->session()->flash('error', 'Register gagal. Silakan coba lagi.');
        return back()->onlyInput('register_email');
        }

    }
}
