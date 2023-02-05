<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class InputBase extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $inputType; 

    public $inputId;

    public $inputLabel;

    public function __construct($inputType, $inputId, $inputLabel)
    {
        $this->inputType = $inputType;
        $this->inputId = $inputId;
        $this->inputLabel = $inputLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-base');
    }
}
