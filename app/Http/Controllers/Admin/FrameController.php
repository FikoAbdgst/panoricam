<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
{
    // Hapus constructor dengan middleware dan ganti dengan metode verifikasi

    private function checkAdminAuth()
    {
        if (!session()->has('admin_id')) {
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $frames = Frame::all();
        return view('admin.frames.index', compact('frames'));
    }

    public function create()
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        return view('admin.frames.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('frames', 'public');

        Frame::create([
            'name' => $request->name,
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.frames.index')
            ->with('success', 'Frame berhasil ditambahkan!');
    }

    public function show(Frame $frame)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        return view('admin.frames.show', compact('frame'));
    }

    public function edit(Frame $frame)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        return view('admin.frames.edit', compact('frame'));
    }

    public function update(Request $request, Frame $frame)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($frame->image_path) {
                Storage::disk('public')->delete($frame->image_path);
            }

            $data['image_path'] = $request->file('image')->store('frames', 'public');
        }

        $frame->update($data);

        return redirect()->route('admin.frames.index')
            ->with('success', 'Frame berhasil diperbarui!');
    }

    public function destroy(Frame $frame)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        // Hapus file gambar dari storage
        if ($frame->image_path) {
            Storage::disk('public')->delete($frame->image_path);
        }

        $frame->delete();

        return redirect()->route('admin.frames.index')
            ->with('success', 'Frame berhasil dihapus!');
    }
}
