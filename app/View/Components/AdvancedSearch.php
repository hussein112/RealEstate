<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdvancedSearch extends Component
{
    public $fors;
    public $wheres;
    public $types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fors, $wheres, $types)
    {
        $this->fors = $fors;
        $this->wheres = $wheres;
        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.advanced-search');
    }
}
