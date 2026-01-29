<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // Pastikan kamu sudah membuat Model Note
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Menampilkan halaman editor berdasarkan pilihan (Private/Public)
    public function create($type)
    {
        // $type akan berisi 'private' atau 'public' dari URL
        return view('notes.editor', compact('type'));
    }

    // Menyimpan catatan ke database
    public function store(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:private,public',
        ]);

        // 2. Simpan ke database
        Note::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content, // Ini menyimpan HTML dari rich text editor kamu
            'status' => $request->status,
        ]);

        // 3. Kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Catatan berhasil disimpan!');
    }
}