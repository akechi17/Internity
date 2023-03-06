<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();
        $user = User::find($user->id);

        // condition to check if the password is the same as the old one
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }
    }
}
