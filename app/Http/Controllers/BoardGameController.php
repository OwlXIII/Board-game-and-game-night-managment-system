<?php

namespace App\Http\Controllers;

use App\Enumerations\BoardGameStatus;
use App\Enumerations\PlayerLimit;
use App\Http\Requests\StoreBoardGameRequest;
use App\Http\Requests\UpdateBoardGameRequest;
use App\Models\BoardGame;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoardGameController extends Controller
{
    /**
     * Shows board games with filter
     *
     * @return View
     */
    public function index(Request $request) : View
    {
        $boardGames = BoardGame::search($request->all())
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = BoardGame::distinct('category')
            ->pluck('category')
            ->sort()
            ->values();

        return view('boardgames.index', array_merge([
            'boardGames' => $boardGames,
            'categories' => $categories,
        ]));
    }

    /**
     * Shows board game create page
     *
     * @return View
     */
    public function create() : View
    {
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
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();
        $validated['status'] = BoardGameStatus::Pending->value;

        BoardGame::create($validated);

        return redirect()->route('boardgames.index')->with('app.success', 'app.createdBoardGame');
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
        $boardGame->delete();

        return redirect()->route('boardgames.index')->with('app.success', 'app.deletedBoardGame');
    }
}
