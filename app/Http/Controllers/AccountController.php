<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function settings()
    {
        return view('account.settings');
    }

    // Security

    public function security()
    {
        return view('account.security');
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['password' => __('Password is incorrect')]);
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return back()->with('success', __('Password changed successfully'));
    }
}
