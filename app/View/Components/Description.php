<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Description extends Component
{
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $name;
    /**
     * @var null
     */
    public $defaultValue;
    /**
     * @var null
     */
    public $form;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label='Description',$name='description_name',$defaultValue=null,$form=null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->defaultValue = $defaultValue;
        $this->form = $form;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.description');
    }
}
