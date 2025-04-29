<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
{

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

        $frames = Frame::with('category')->get();
        return view('admin.frames.index', compact('frames'));
    }

    public function create()
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $categories = Category::all();
        return view('admin.frames.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('frames', 'public');

        Frame::create([
            'name' => $request->name,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
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

        $categories = Category::all();
        return view('admin.frames.edit', compact('frame', 'categories'));
    }

    public function update(Request $request, Frame $frame)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('image')) {
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

        if ($frame->image_path) {
            Storage::disk('public')->delete($frame->image_path);
        }

        $frame->delete();

        return redirect()->route('admin.frames.index')
            ->with('success', 'Frame berhasil dihapus!');
    }
}
