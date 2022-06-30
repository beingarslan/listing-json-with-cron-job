<?php

namespace App\View\Components;

use App\Models\Fruit;
use Illuminate\View\Component;

class ListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fruits;
    public function __construct($id)
    {
        $this->fruits = Fruit::where('parent_id', $id)->with('children')->orderBy('label')->get();
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
