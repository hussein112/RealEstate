<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    public string $type;
    public string $msg;
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $msg, $title = null)
    {
        $this->type = $type;
        $this->msg = $msg;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-message');
    }
}
