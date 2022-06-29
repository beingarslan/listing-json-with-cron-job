<?php

namespace App\View\Components;

use App\Models\Fruite;
use Illuminate\View\Component;

class ListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fruites;
    public function __construct($id)
    {
        $this->fruites = Fruite::where('parent_id', $id)->with('children')->orderBy('label')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-component');
    }
}
