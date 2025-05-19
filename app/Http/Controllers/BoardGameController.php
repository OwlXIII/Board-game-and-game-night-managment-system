<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardGameRequest;
use App\Http\Requests\UpdateBoardGameRequest;
use App\Models\BoardGame;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BoardGameController extends Controller
{
    /**
     * Shows board games
     *
     * @return View
     */
    public function index() : View
    {
        return view('boardgames.index', ['boardGames' => BoardGame::latest()->paginate(10),]);

    }

    /**
     * Shows board game create page
     *
     * @return View
     */
    public function create() : View
    {
        $this->authorize('admin');
        return view('boardgames.create');
    }

    /**
     * Saves created board game
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreBoardGameRequest $request) : RedirectResponse
    {
        $validated = $request->validate();
        $validated['created_by'] = Auth::id();

        BoardGame::create($validated);

        return redirect()->route('boardgames.index')->with('app.success', 'Game created successfully!');
    }

    /**
     * Shows board game information
     *
     * @param BoardGame $boardGame
     * @return View
     */
    public function show(BoardGame $boardGame) : View
    {
        return view('boardgames.show', compact('boardGame'));
    }

    /**
     * Shows board game edit page
     *
     * @param BoardGame $game
     * @return View
     */
    public function edit(BoardGame $game) : View
    {
        $this->authorize('admin');
        return view('boardgames.edit', compact('game'));
    }

    /**
     * Updates board game information
     *
     * @param Request $request
     * @param BoardGame $boardGame
     * @return RedirectResponse
     */
    public function update(UpdateBoardGameRequest $request, BoardGame $boardGame) : RedirectResponse
    {
        $boardGame->update($request->validated());

        return redirect()->route('boardgames.index')->with('app.success', 'app.updatedBoardGame');
    }

    /**
     * Deletes board game
     *
     * @param BoardGame $boardGame
     * @return RedirectResponse
     */
    public function destroy(BoardGame $boardGame) : RedirectResponse
    {
        $this->authorize('admin');

        $boardGame->delete();

        return redirect()->route('boardgames.index')->with('app.success', 'app.deletedBoardGame');
    }
}
