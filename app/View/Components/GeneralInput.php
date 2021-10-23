<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GeneralInput extends Component
{
    /**
     * Type of input [text, date, file, password, number, email, time, checkbox]
     * @var
     */
    public $type;
    /**
     * @var
     */
    public $attr;

    /**
     * @var
     */
    public $key;
    /**
     * The language of input
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
    public function __construct($type, $attr, $key = null, $lang = null, $index = null, $item = null)
    {
        $this->type = $type;
        $this->attr = $attr;
        $this->key = $key;
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
        return view('components.form.general-input');
    }
}
