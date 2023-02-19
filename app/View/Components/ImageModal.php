<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageModal extends Component
{
    public $targetId;

    public $modalTitle;

    public $img;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($targetId, $modalTitle, $img)
    {
        $this->targetId = $targetId;
        $this->modalTitle = $modalTitle;
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image-modal');
    }
}
