<?php

namespace App\Http\Controllers;

use App\Models\GameNight;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $upcomingGameNights = GameNight::where('event_time', '>=', now())
            ->orderBy('event_time')
            ->withCount('participants')
            ->take(3)
            ->get();

        return view('home', compact('upcomingGameNights'));
    }
}
