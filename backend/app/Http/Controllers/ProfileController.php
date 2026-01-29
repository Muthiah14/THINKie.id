<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Tampilkan form edit profil user.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }

    /**
     * Update profil user ke database.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // validasi input
        $request->validate([
            'username' => 'nullable|string|max:50',
            'bio'      => 'nullable|string|max:255',
            'profile'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // update field
        $user->username = $request->username ?? $user->username;
        $user->bio      = $request->bio ?? $user->bio;

        // upload foto
        if ($request->hasFile('profile')) {
            $filename = time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('uploads/profile'), $filename);
            $user->image = 'uploads/profile/' . $filename;
        }
/** @var \App\Models\User $user */
$user = Auth::user();
        // simpan perubahan
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }
}
