<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameNightRequest;
use App\Models\EventParticipants;
use App\Models\GameNight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GameNightController extends Controller
{

    /**
     * To see all existing Game nights
     *
     * @return View
     */
    public function index() : View
    {
        return view('gamenights.index', [
            'gameNights' => GameNight::where('event_time', '>=', now())->orderBy('event_time')->get()
        ]);
    }

    /**
     * Shows detailed information about game night
     *
     * @param GameNight $gameNight
     * @return View
     */
    public function show(GameNight $gameNight) : View
    {
        return view('gamenights.show', compact('gameNight'));
    }

    /**
     * Shows game night create page
     *
     * @return View
     */

    public function create() : View
    {
        return view('gamenights.create');
    }

    /**
     * Stores information about new Game Night Event
     *
     * @param StoreGameNightRequest $request
     * @return RedirectResponse
     */

    public function store(StoreGameNightRequest $request) : RedirectResponse
    {
        $validated = $request->validated();
        GameNight::create(array_merge($validated, [
            'created_by' => Auth::id(),
        ]));

        return redirect()->route('gamenights.index')->with('app.success', __('app.gamenightCreated'));
    }

    /**
     * Register to game nights
     *
     * @param GameNight $gameNight
     * @return RedirectResponse
     */
    public function register(GameNight $gameNight) : RedirectResponse
    {
        $userId = auth()->id();

        $alreadyRegistered = EventParticipants::where('user_id', $userId)
            ->where('game_night_id', $gameNight->id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('app.error', __('app.alreadyRegisteredToNight'));
        }

        EventParticipants::create([
            'user_id' => $userId,
            'game_night_id' => $gameNight->id,
        ]);

        return back()->with('app.success', __('app.registeredSuccessfully'));
    }

    /**
     * Un-register from game nights
     *
     * @param GameNight $gameNight
     * @return RedirectResponse
     */
    public function unregister(GameNight $gameNight) : RedirectResponse
    {
        $userId = auth()->id();

        if ($gameNight->created_by === $userId) {
            return back()->with('app.error', __('app.creatorCannotUnregister'));
        }

        $gameNight->participants()->where('user_id', $userId)->delete();

        return back()->with('app.success', __('appUnregisteredSuccessfully'));
    }
}
