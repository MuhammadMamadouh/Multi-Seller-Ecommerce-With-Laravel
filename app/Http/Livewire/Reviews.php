<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public $product;
    public $reviews;
    public $newReview;
    public $body;
    public $title;
    public $rate;


    public function addReview()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'rate'  => 'nullable|numeric|min:1|max:5'
        ]);
        $newReview = Review::create([
            'user_id' => auth('web')->user()->id,
            'product_id' =>$this->product->id,
            'body' => $this->body,
            'title' => $this->title,
            'rate'  => $this->rate,
        ]);
        $this->reviews->prepend($newReview);
        $this->body = $this->title = '';

    }

    public function remove($reviewId){
        $r = Review::findOrFail($reviewId);
        $r->delete();
        $this->reviews->except($reviewId);
        session()->flash('message', __('messages.deleted_successfully'));
    }
    public function render()
    {
        return view('livewire.reviews', ['reviews' => $this->product->reviews()->orderBy('created_at', 'desc')->paginate(2)]);
    }
}
