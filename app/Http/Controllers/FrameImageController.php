<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use App\Models\FrameImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrameImageController extends Controller
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

        $frameImages = FrameImage::with('frame')->get();
        return view('admin.frameimages.index', compact('frameImages'));
    }

    public function create()
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $frames = Frame::all();
        return view('admin.frameimages.create', compact('frames'));
    }

    public function store(Request $request)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'id_frame' => 'required|exists:frames,id',
            'frame1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Validate at least one frame is uploaded
        if (
            !$request->hasFile('frame1') && !$request->hasFile('frame2') &&
            !$request->hasFile('frame3') && !$request->hasFile('frame4')
        ) {
            return back()->withErrors(['error' => 'Minimal satu gambar frame harus diunggah.']);
        }

        $data = [
            'id_frame' => $request->id_frame,
        ];

        // Process each frame image if present
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = 'frame' . $i;
            if ($request->hasFile($fieldName)) {
                $data[$fieldName] = $request->file($fieldName)->store('frameimages', 'public');
            }
        }

        FrameImage::create($data);

        return redirect()->route('admin.frameimages.index')
            ->with('success', 'Frame Image berhasil ditambahkan!');
    }

    public function show(FrameImage $frameimage)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        return view('admin.frameimages.show', compact('frameimage'));
    }

    public function edit(FrameImage $frameimage)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $frames = Frame::all();
        return view('admin.frameimages.edit', compact('frameimage', 'frames'));
    }

    public function update(Request $request, FrameImage $frameimage)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'id_frame' => 'required|exists:frames,id',
            'frame1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'frame4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'id_frame' => $request->id_frame,
        ];

        // Process each frame image if present
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = 'frame' . $i;
            if ($request->hasFile($fieldName)) {
                // Delete old image if exists
                if ($frameimage->$fieldName) {
                    Storage::disk('public')->delete($frameimage->$fieldName);
                }
                $data[$fieldName] = $request->file($fieldName)->store('frameimages', 'public');
            }
        }

        $frameimage->update($data);

        return redirect()->route('admin.frameimages.index')
            ->with('success', 'Frame Image berhasil diperbarui!');
    }

    public function destroy(FrameImage $frameimage)
    {
        if (!$this->checkAdminAuth()) {
            return redirect()->route('admin.login');
        }

        // Delete all images if exists
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = 'frame' . $i;
            if ($frameimage->$fieldName) {
                Storage::disk('public')->delete($frameimage->$fieldName);
            }
        }

        $frameimage->delete();

        return redirect()->route('admin.frameimages.index')
            ->with('success', 'Frame Image berhasil dihapus!');
    }
}
