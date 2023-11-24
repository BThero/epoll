<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $id,
        public string $rootClass,
        public bool   $disabled,
        public bool   $checked,
    )
    {
    }

    private string $inputClass = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600';
    private string $labelEnabledClass = "ms-2 text-sm font-medium text-gray-900 dark:text-gray-300";
    private string $labelDisabledClass = "ms-2 text-sm font-medium text-gray-400 dark:text-gray-500";

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio', [
            'name' => $this->name,
            'id' => $this->id,
            'root_class' => $this->rootClass,
            'disabled' => $this->disabled,
            'checked' => $this->checked,
            'input_class' => $this->inputClass,
            'label_class' => $this->disabled ? $this->labelDisabledClass : $this->labelEnabledClass,
        ]);
    }
}
