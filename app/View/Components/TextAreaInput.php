<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextAreaInput extends Component
{

    /**
     * @var
     */
    public $attr;

    /**
     * The language of text area
     * @var
     */
    public $lang;
    /**
     * Reference to item edited in the editing page
     * @var mixed|null
     */
    public $item;

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
     * Determine if the given option is the currently selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isItem($item)
    {
        return $item === $this->$item;
    }

    /**
     * Get the view / contents that represent the components.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area-input');
    }
}
