<?php

namespace App\View\Components\homepage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameNightTile extends Component
{
    public $gameNight;
    public $delay;

    /**
     * Create a new component instance.
     */
    public function __construct($gameNight, $delay = 0)
    {
        $this->$gameNight = $gameNight;
        $this->delay = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.homepage.game-night-tile');
    }
}
