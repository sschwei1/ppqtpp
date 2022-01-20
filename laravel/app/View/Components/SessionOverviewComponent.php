<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SessionOverviewComponent extends Component
{
    public $id;
    public $title;
    public $description;
    public $numberOfQuestions;
    public $date;
    public $UrlSessionInfo;

    public function __construct($title = '',$description = '', $numberOfQuestions = '',  $date = '', $UrlSessionInfo = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->numberOfQuestions = $numberOfQuestions;
        $this->date = $date;
        $this->UrlSessionInfo = $UrlSessionInfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.session-overview-component');
    }
}
