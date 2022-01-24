<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SessionOverviewComponent extends Component
{
    public $title;
    public $numberOfQuestions;
    public $date;
    public $duration;
    public $url;

    public function __construct($title = '', $numberOfQuestions = '',  $date = '', $duration = '', $url = '')
    {
        $this->title = $title;
        $this->numberOfQuestions = $numberOfQuestions;
        $this->date = $date;
        $this->duration = $duration;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.session-overview-component', [
            'title' => $this->title,
            'questionCount' => $this->numberOfQuestions,
            'date' => $this->date,
            'duration' => $this->duration,
            'url' => $this->url
        ]);
    }
}
