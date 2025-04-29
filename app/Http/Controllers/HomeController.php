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

        if ($request->has('category')) {
            $categoryId = $request->query('category');
            $selectedCategory = Category::find($categoryId);

            if ($selectedCategory) {
                $frames = Frame::where('category_id', $categoryId)->get();
                return view('home', compact('categories', 'frames', 'selectedCategory'));
            }
        }

        $frames = Frame::all();
        return view('home', compact('categories', 'frames'));
    }
}
