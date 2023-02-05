<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{

    /**
     * Page name: valuation, buy, rent....
     * @var string
     */
    public string $page;

    /**
     * Create a new component instance.
     * @return void
     */
    public function __construct(string $page)
    {
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
