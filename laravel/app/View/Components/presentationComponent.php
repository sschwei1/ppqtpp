<?php

namespace App\View\Components;

use Illuminate\View\Component;

class presentationComponent extends Component
{
    public $id;
    public $title;
    public $description;
    public $numberOfQuestion;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $title = '',$description = '', $numberOfQuestion = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->numberOfQuestion = $numberOfQuestion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.presentation-component');
    }
}
