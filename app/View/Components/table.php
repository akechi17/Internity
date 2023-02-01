<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $pageName, $pagination;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageName, $pagination)
    {
        //
        $this->pageName = $pageName;
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
