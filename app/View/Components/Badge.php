<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    protected string $customClass;

    protected string $commonClass = 'text-xs font-medium me-2 px-2.5 py-0.5 rounded';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
    )
    {
        if ($type === 'default') {
            $this->customClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
        } elseif ($type === 'dark') {
            $this->customClass = 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
        } elseif ($type === 'red') {
            $this->customClass = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badge', ['class' => $this->commonClass . ' ' . $this->customClass]);
    }
}
