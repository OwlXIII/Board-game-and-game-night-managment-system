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
}
