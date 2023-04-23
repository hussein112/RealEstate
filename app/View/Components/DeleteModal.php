<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $target;

    public $auth; // a -> admin, e -> employee

    public $targetId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($target, $targetId, $auth)
    {
        $this->target = $target;
        $this->targetId = $targetId;
        $this->auth = $auth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-modal');
    }
}
