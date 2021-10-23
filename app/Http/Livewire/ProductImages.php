<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.product-images');
    }
}
