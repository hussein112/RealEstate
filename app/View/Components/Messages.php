<?php

namespace App\View\Components;

use Illuminate\View\Component;

class messages extends Component
{
    public $msg;

    // danger, success, or any bootstrap alert color
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($msg, $type)
    {
        $this->msg = $msg;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.messages');
    }
}
