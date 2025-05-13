<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardGameController extends Controller
{
    /*public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }*/
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boardGames = BoardGame::latest()->paginate(10);
        return view('boardgames.index', compact('boardGames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');
        return view('boardgames.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('admin');

        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'category' => 'nullable|string|max:50',
            'player_count_min' => 'required|integer|min:1',
            'player_count_max' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:5',
            'complexity' => 'required|in:low,medium,high',
            'rules' => 'nullable|string',
        ]);

        $validated['created_by'] = Auth::id();

        BoardGame::create($validated);

        return redirect()->route('boardgames.index')->with('success', 'Game created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardGame $boardGame)
    {
        return view('boardgames.show', compact('boardGame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardGame $game)
    {
        $this->authorize('admin');
        return view('boardgames.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardGame $boardGame)
    {
        $this->authorize('admin');

        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'category' => 'nullable|string|max:50',
            'player_count_min' => 'required|integer|min:1',
            'player_count_max' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:5',
            'complexity' => 'required|in:low,medium,high',
            'rules' => 'nullable|string',
        ]);

        $boardGame->update($validated);

        return redirect()->route('boardgames.index')->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardGame $boardGame)
    {
        $this->authorize('admin');

        $boardGame->delete();

        return redirect()->route('boardgames.index')->with('success', 'Game deleted.');
    }
}
