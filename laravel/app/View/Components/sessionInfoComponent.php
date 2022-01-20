<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sessionInfoComponent extends Component
{
    public $id;
    public $user;
    public $timestamp;
    public $question;
    public $UrlSessionInfo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $user = '', string $question = '', $timestamp = '', $UrlSessionInfo = '')
    {
        $this->user = $user;
        $this->question = $question;
        $this->timestamp = $timestamp;
        $this->UrlSessionInfo = $UrlSessionInfo;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.session-info-component');
    }
}
