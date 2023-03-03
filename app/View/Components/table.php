<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $routeCreate, $pageName, $pagination, $tableData, $permissionCreate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageName, $pagination, $tableData, $routeCreate = null, $permissionCreate = null)
    {
        $this->routeCreate = str_replace('&amp;', '&', $routeCreate);
        $this->pageName = $pageName;
        $this->pagination = $pagination;
        $this->tableData = $tableData;
        $this->permissionCreate = $permissionCreate;
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
