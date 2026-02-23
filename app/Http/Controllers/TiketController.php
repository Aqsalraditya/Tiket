<?php

namespace App\Http\Controllers;

use App\Models\Tiket; // Pastikan nama model sesuai
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Tiket::latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        Tiket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        return view('tickets.show', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        // Mengirim data tiket yang dipilih ke view edit
        return view('tickets.edit', compact('tiket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        // 1. Validasi data
        $request->validate([
            'title'       => 'required|min:5',
            'description' => 'required',
            'status'      => 'required|in:open,in_progress,closed',
        ]);

        // 2. Update data
        $tiket->update($request->all());

        // 3. Redirect
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah dari (Tiket $tiket) menjadi (Tiket $ticket)
    public function destroy(Tiket $ticket) 
    {
        $ticket->delete(); // Sekarang Laravel tahu data mana yang harus dihapus
        return redirect()->route('tickets.index')->with('success', 'Ticket berhasil dihapus.');
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'body' => 'required|min:3|max:1000',
        ]);

        $cleanComment = strip_tags($request->body);

        return back()->with('success', 'Komentar aman tersimpan!');
    }
}   