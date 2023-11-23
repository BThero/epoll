<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $uri = '/' . Route::current()->uri();
        return view('components.nav-link', [
            'href' => $this->href,
            'active' => str_starts_with($uri, $this->href),
        ]);
    }
}
