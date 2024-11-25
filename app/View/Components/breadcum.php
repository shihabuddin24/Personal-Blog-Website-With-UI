<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcum extends Component
{
    /**
     * Create a new component instance.
     */

     public $slogan;
     public $subslogan;
    public function __construct($slogan,$subslogan)
    {
        $this->slogan = $slogan;
        $this->subslogan = $subslogan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcum');
    }
}
