<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameNightRequest;
use App\Models\GameNight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GameNightController extends Controller
{
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
}
