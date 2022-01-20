<?php

namespace App\View\Components;

use Illuminate\View\Component;

class presentationComponent extends Component
{
    public $id;
    public $title;
    public $description;
    public $numberOfQuestion;
    public $UrlSessionOverview;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $title = '',$description = '', $numberOfQuestion = '', $UrlSessionOverview = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->numberOfQuestion = $numberOfQuestion;
        $this->UrlSessionOverview = $UrlSessionOverview;
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
