<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
class AutoComplete extends Component
{

    public $query;
    public $products;
    public $highlightIndex;

    public function resetForm()
    {
        $this->query = '';
        $this->products = [];
        $this->highlightIndex = 0;
    }
    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->products) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->products) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $product = $this->products[$this->highlightIndex] ?? null;
        if ($product) {
            $this->redirect(route('product.details', $product->id));
        }
    }

    public function updatedQuery()
    {
        $this->products = Product::whereHas('translations', function (Builder $query) {
            $query->where('product_translations.name', 'like', '%' . $this->query . '%');
        })->limit(5)->get('id', 'name');
    }
    public function render()
    {
        return view('livewire.auto-complete');
    }
}
