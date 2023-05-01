<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public string $auth;
    public string $title;
    public int $latestCount;
    public int $count;
    public string $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($auth, $latestCount, $count, $title, $icon)
    {
        $this->auth = $auth;
        $this->latestCount = $latestCount;
        $this->count = $count;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-card');
    }
}
