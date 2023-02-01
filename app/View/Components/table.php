<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $targetTambah, $idTambah, $labelTambah, $targetEdit, $idEdit, $labelEdit, $pageName, $pagination;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($targetTambah, $idTambah, $labelTambah, $targetEdit, $idEdit, $labelEdit, $pageName, $pagination)
    {
        //
        $this->targetTambah = $targetTambah;
        $this->idTambah = $idTambah;
        $this->labelTambah = $labelTambah;
        $this->targetEdit = $targetEdit;
        $this->idEdit = $idEdit;
        $this->labelEdit = $labelEdit;
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
