<?php

namespace App\View\Components\latihan;

use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $isi, $val1, $val2, $val3, $val4;
    public function __construct($isi, $val1, $val2, $val3, $val4)
    {
        //
        $this->isi = $isi;
        $this->val1 = $val1;
        $this->val2 = $val2;
        $this->val3 = $val3;
        $this->val4 = $val4;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latihan.select');
    }
}
