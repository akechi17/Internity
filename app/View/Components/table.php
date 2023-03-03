<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $routeCreate, $pageName, $pagination, $tableData, $permissionCreate, $roleCreate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageName, $pagination, $tableData, $routeCreate = null, $permissionCreate = null, $roleCreate = null)
    {
        $this->routeCreate = str_replace('&amp;', '&', $routeCreate);
        $this->pageName = $pageName;
        $this->pagination = $pagination;
        $this->tableData = $tableData;
        $this->permissionCreate = $permissionCreate;
        $this->roleCreate = $roleCreate != null ? str_replace(' ', '|', $roleCreate) : null;
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
