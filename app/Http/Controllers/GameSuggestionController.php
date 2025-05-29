<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameSuggestionRequest;
use App\Models\GameNight;
use App\Models\GameSuggestions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameSuggestionController extends Controller
{
    /**
     * Stores game suggestion
     *
     * @param StoreGameSuggestionRequest $request
     * @param GameNight $gameNight
     * @return RedirectResponse
     */
    public function store(StoreGameSuggestionRequest $request, GameNight $gameNight): RedirectResponse
    {
        $user = Auth::user();

        GameSuggestions::firstOrCreate([
            'game_night_id' => $gameNight->id,
            'suggested_by' => $user->id,
            'game_id' => $request->board_game_id,
        ]);

        return back()->with('app.success', __('app.youSuggestedGame'));
    }

    /**
     * Registers votes for game suggestion
     *
     * Votes are counted only once per user per game night
     *
     * @param GameNight $gameNight
     * @param GameSuggestions $suggestion
     * @return RedirectResponse
     */
    public function vote(GameNight $gameNight, GameSuggestions $suggestion): RedirectResponse
    {
        $user = auth()->user();

        abort_if($suggestion->game_night_id !== $gameNight->id, 403, __('app.invalidVote'));

        if ($suggestion->voters()->where('user_id', $user->id)->exists()) {
            return back()->with('app.error', 'app.alreadyVoted');
        }

        $suggestion->voters()->attach($user->id);
        $suggestion->increment('votes');

        return back()->with('app.success', 'app.successfullyVoted');
    }
}
