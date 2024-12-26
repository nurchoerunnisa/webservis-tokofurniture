<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        return view('profile', compact('user', 'role'));
    }

    public function edit()
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        return view('profile-edit', compact('user', 'role'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public');
            $nama_gambar = str_replace('public/', '', $path);

            if ($user->gambar) {
                $old_image = public_path('images/') . $user->gambar;
                if (file_exists($old_image)) {
                    $file = File::where('path', $user->gambar)->first();
                    $file->path = $nama_gambar;
                    $file->save();

                    Storage::delete('public/' . $user->gambar);
                } else {
                    File::create([
                        'path' => $nama_gambar,
                        'type' => $request->file('gambar')->getClientMimeType(),
                    ]);
                }
            }

            $user->gambar = $nama_gambar;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
