<?php

namespace App\Http\Livewire;

use App\Models\ProductSizes;
use Livewire\Component;

class ProductInformation extends Component
{
    public $sizeId;
    public $size;
    public $product;
    public $originalPrice;
    public $offerPrice;
    public $stock;
    public $discount;
    public $minPrice;
    public $maxPrice;

    public function changeSize()
    {
        $this->size = ProductSizes::find($this->sizeId);
        if ($this->size) {
            $this->originalPrice = $this->size->original_price;
            $this->offerPrice = $this->size->offer_price;
            $this->stock = $this->size->stock;
            $this->discount = $this->originalPrice > 0 ? (100 - floor(($this->offerPrice / $this->originalPrice) * 100)) : 0;
        }else{
            $this->mount();
        }
    }

    public function mount()
    {
        $this->originalPrice = $this->product->price;
        $this->offerPrice = $this->product->offer_price;
        $this->stock = $this->product->stock;
        $this->discount = $this->product->discount;
        $this->minPrice = ProductSizes::where('product_id', $this->product->id)->min('original_price');
        $this->maxPrice = ProductSizes::where('product_id', $this->product->id)->max('original_price');
    }

    public function render()
    {
        return view('livewire.product-information', [
            'originalPrice' => $this->originalPrice,
            'offerPrice' => $this->offerPrice,
            'stock' => $this->stock,
            'discount' => $this->discount,
            'minPrice'  => $this->minPrice,
            'maxPrice'  => $this->maxPrice,
        ]);
    }
}
