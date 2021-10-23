<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * @var
     */
    public $attr;

    /**
     * The language of text input
     * @var
     */
    public $lang;

    /**
     * The item edited in the editing page
     * @var mixed|null
     */
    public $item;

    /**
     * Index of language
     * @var
     */
    public $index;

    /**
     * Create a new components instance.
     *
     * @return void
     */
    public function __construct($attr, $lang=null, $index=null, $item = null)
    {
        $this->attr = $attr;
        $this->lang = $lang;
        $this->item = $item;
        $this->index = $index;

    }
    /**
     * Get the view / contents that represent the components.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-input');
    }
}
