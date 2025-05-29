<?php

namespace App\View\Components\homepage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameNightTile extends Component
{
    public $night;
    public $delay;

    /**
     * Create a new component instance.
     */
    public function __construct($night, $delay = 0)
    {
        $this->night = $night;
        $this->delay = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.homepage.game-night-tile');
    }
}
