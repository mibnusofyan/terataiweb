<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('client.review', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        $reviewData = [
            'rating' => $request->rating,
            'message' => $request->message,
        ];

        if (Auth::check()) {
            $user = Auth::user();
            $reviewData['user_id'] = $user->id;
            $reviewData['name'] = $user->name;
            // Use the new avatar_url field
            if (!empty($user->avatar_url)) {
                $reviewData['image_path'] = $user->avatar_url;
            }
        } else {
            $request->validate(['name' => 'required|string|max:255']); 
            $reviewData['name'] = $request->name; 
        }

        Review::create($reviewData);

        return redirect()->route('reviews.index')->with('success', 'Ulasan Anda berhasil dikirim!');
    }
}
