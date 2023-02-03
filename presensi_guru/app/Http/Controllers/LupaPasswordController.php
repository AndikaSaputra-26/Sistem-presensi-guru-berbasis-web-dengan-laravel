<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LupaPasswordController extends Controller
{
    public function index()
    {
        return view('lupa_password.index');
    }
    public function update(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if(!$user){
            return redirect()->back()->with('alert', 'Username yang Anda masukkan tidak ditemukan');
        }
        $user->update(['password' => bcrypt($request->password_baru) ]);
        return redirect()->back()->with('success', 'Password baru berhasil di reset');
    }
}
