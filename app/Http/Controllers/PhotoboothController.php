<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use Illuminate\Http\Request;

class PhotoboothController extends Controller
{
    public function index()
    {
        $frames = Frame::where('is_active', true)->get();

        return view('booth.index', compact('frames'));
    }
}
