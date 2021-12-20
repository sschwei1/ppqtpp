<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public string $action;
    public string $method;
    public string $submit;
    public string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method = 'post', $submit = 'Submit', $title = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->submit = $submit;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory|Application
    {
        return view('components.form');
    }
}
