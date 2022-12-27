<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verify(Request $request, $id, $token)
    {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('success', 'Your email is already verified.');
        }

        if (hash_equals((string) $token, sha1($user->getEmailForVerification()))) {
            $user->markEmailAsVerified();

            return redirect()->route('dashboard')->with('success', 'Your email is verified.');
        }

        return redirect()->route('dashboard')->with('error', 'Your email is not verified.');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('success', 'Your email is already verified.');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }

    public function notice (Request $request)
    {
        $this->resend($request);

        return view('auth.verify');
    }
}
