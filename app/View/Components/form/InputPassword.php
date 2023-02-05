<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class InputPassword extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $label;
    public $value;
    public $name;

    public function __construct($id, $label, $name, $value = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-password');
    }
}
