<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Method untuk menangani route 'note.private'
    public function private()
    {
        $status = 'private';
        return view('notes.create', compact('status'));
    }

    // Method untuk menangani route 'note.public'
    public function public()
    {
        $status = 'public';
        return view('notes.create', compact('status'));
    }

public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'content' => 'required',
        'status' => 'required|in:private,public',
    ]);

    // 2. Simpan ke Database (Cukup satu kali saja)
    // Menggunakan Auth::id() biasanya menghilangkan garis merah di VS Code
    Note::create([
        'user_id' => Auth::id(), 
        'content' => $request->content,
        'status'  => $request->status,
    ]);

    // 3. Redirect ke halaman yang diinginkan
    // Pastikan route 'notes.index' atau 'optionnote' sudah ada di web.php
    return redirect()->route('optionnote')->with('success', 'Note created!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
