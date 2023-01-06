<?php

namespace App\View\Components\latihan;

use Illuminate\View\Component;

class radios extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $radio, $fm, $nama;
    public function __construct($radio, $fm, $nama)
    {
        $this->radio = $radio;
        $this->fm = $fm;
        $this->nama = $nama;

        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latihan.radios');
    }
}
