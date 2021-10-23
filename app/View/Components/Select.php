<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{

    /**
     * @var
     */
    public $attr;

    /**
     * The item edited in the editing page
     * @var mixed|null
     */
    public $item;

    public $key;

    /**
     * Create a new components instance.
     *
     * @return void
     */
    public function __construct($attr, $key, $item = null)
    {
        $this->item = $item;
        $this->attr = $attr;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the components.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
