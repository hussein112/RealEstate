<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SettingsCard extends Component
{
    public string $header;
    public string $body;
    public string $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $body, $link)
    {
        $this->header = $header;
        $this->body = $body;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.settings-card');
    }
}
