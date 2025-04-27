<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Frame;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Check if category filter is applied via query parameter
        if ($request->has('category')) {
            $categoryId = $request->query('category');
            $selectedCategory = Category::find($categoryId);

            if ($selectedCategory) {
                $frames = Frame::where('category_id', $categoryId)->get();
                return view('home', compact('categories', 'frames', 'selectedCategory'));
            }
        }

        // Default: show all frames
        $frames = Frame::all();
        return view('home', compact('categories', 'frames'));
    }
}
