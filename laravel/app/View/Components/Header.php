<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public string $link;
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $link = "", $title = "")
    {
        $this->link = $link;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render(): View|string|Closure
    {
        return view('components.header', [
            'link' => $this->link,
            'title' => $this->title
        ]);
    }
}
