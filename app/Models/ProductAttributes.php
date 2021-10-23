<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $table = 'product_attributes';
    use HasFactory, Search;

    protected $fillable = ['attribute_id', 'product_id', 'original_price', 'offer_price', 'stock', 'value'];
    public $timestamps = false;

    protected $with = 'attribute';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id');
    }

}
