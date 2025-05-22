<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
use App\Models\GameReviews;
use Illuminate\Http\Request;

class BoardGameReviewController extends Controller
{
    public function store(Request $request, BoardGame $boardGame)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        GameReviews::updateOrCreate(
            ['game_id' => $boardGame->id, 'user_id' => auth()->id()],
            $validated
        );

        return back()->with('success', __('Review submitted.'));
    }
}
