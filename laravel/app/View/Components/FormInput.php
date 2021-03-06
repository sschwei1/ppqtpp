<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $id;
    public $title;
    public $placeholder;
    public $type;
    public $hidden;
    public $value;
    public $class;
    public $labelClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title = '', $placeholder = null, $type = 'text', $hidden = false, $value = '', $class = '', $labelClass = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->placeholder = $placeholder ?? $title;
        $this->type = $type;
        $this->hidden = $hidden;
        $this->value = $value;
        $this->class = $class;
        $this->labelClass = $labelClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        return view('components.form-input');
    }
}
