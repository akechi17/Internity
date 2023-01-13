<?php

namespace App\View\Components\latihan;

use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $id;
    public function __construct($class, $id)
    {
        $this->class = $class;
        $this->id = $id;
        // $this->for = $for;
        // $this->label = $label;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latihan.checkbox');
    }
}
