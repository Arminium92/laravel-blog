<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CKEditor extends Component
{
    public $name;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $id=null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.c-k-editor');
    }
}
