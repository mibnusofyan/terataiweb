<?php
namespace App\Http\Controllers;

use App\Models\Review;

class LandingPageController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('welcome', compact('reviews'));
    }
}
