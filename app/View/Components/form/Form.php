<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $formAction;

    public $formMethod;

    public $formTitle;

    public function __construct($formAction, $formMethod, $formTitle)
    {
        $this->formAction = $formAction;
        $this->formMethod = $formMethod;
        $this->formTitle = $formTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form');
    }
}
