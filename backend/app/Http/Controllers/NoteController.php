<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /*Private note*/
    public function private()
    {
        return view('notePage', ['status' => 'private']);
    }

    /*Public note*/
    public function public()
    {
        return view('notePage', ['status' => 'public']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /*Method standar resource 'store' untuk menyimpan data.*/
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'status'  => 'required|in:private,public',
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'status'  => $request->status,
        ]);

        return redirect()->route('optionnote')->with('success', 'Catatan berhasil dibuat!');
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
