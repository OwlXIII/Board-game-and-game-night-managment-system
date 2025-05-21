<?php

namespace App\Http\Controllers;

use App\Enumerations\BoardGameStatus;
use App\Http\Requests\StoreBoardGameRequest;
use App\Http\Requests\UpdateBoardGameRequest;
use App\Models\BoardGame;
use App\Support\Constants;
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
        $query = BoardGame::query()->where('status', 'approved');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('complexity')) {
            $query->where('complexity', $request->complexity);
        }

        if ($request->filled('min_players')) {
            $query->where('min_players', '<=', $request->min_players);
        }

        if ($request->filled('max_players')) {
            $query->where('max_players', '>=', $request->max_players);
        }

        if ($request->filled('min_duration')) {
            $query->where('duration', '>=', $request->min_duration);
        }

        if ($request->filled('max_duration')) {
            $query->where('duration', '<=', $request->max_duration);
        }

        $boardGames = $query->latest()->paginate(10)->withQueryString();

        $categories = BoardGame::distinct('category')
            ->pluck('category')
            ->sort()
            ->values();

        return view('boardgames.index', array_merge([
            'boardGames' => $boardGames,
            'categories' => $categories,
        ], Constants::getConstants()));
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
