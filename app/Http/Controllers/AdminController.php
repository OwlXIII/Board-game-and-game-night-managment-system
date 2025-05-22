<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRoleRequest;
use App\Models\BoardGame;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Shows admin dashboard
     *
     * @return View
     */

    public function index() : View
    {
        return view('admin.dashboard')->with('users', User::all());
    }

    /**
     * Update user role
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateRole(UpdateUserRoleRequest $request, User $user) : RedirectResponse
    {
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.dashboard')->with('app.success', 'app.updateRoleInformation');
    }

    /**
     * Shows board games for approval
     *
     * @param BoardGame $boardGame
     * @return View
     */

    public function show(BoardGame $boardGame): View
    {
        return view('admin.boardgames.show', compact('boardGame'));
    }
}
