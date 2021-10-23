<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the components.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.guest');
    }
}
