<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmationDialog extends Component
{
    public string $title;
    public string $body;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirmation-dialog');
    }
}
