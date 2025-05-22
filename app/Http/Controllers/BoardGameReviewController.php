<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGameReviewsRequest;
use App\Models\BoardGame;
use App\Models\GameReviews;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;

class BoardGameReviewController extends Controller
{
    /**
     * Stores Game Reviews
     *
     * @param UpdateGameReviewsRequest $request
     * @param BoardGame $boardGame
     * @return RedirectResponse
     */
    public function store(UpdateGameReviewsRequest $request, BoardGame $boardGame) : RedirectResponse
    {
        $validated = $request->validated();

        GameReviews::updateOrCreate(
            ['game_id' => $boardGame->id, 'user_id' => auth()->id()],
            $validated
        );

        return back()->with('app.success', __('app.submittedReview'));
    }

    /**
     * Deletes Game Review
     *
     * @param BoardGame $boardGame
     * @return RedirectResponse
     */

    public function destroy(BoardGame $boardGame) : RedirectResponse
    {
        if ($boardGame->reviews()->where('user_id', auth()->id())->first()) {
            $boardGame->reviews()->where('user_id', auth()->id())->first()->delete();
        }

        return back()->with('app.success', __('app.deletedReview'));
    }
}
