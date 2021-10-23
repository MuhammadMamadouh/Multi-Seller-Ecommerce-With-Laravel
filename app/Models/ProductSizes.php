<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model
{
    protected $table = 'products_sizes';
    use HasFactory, Search;

    protected $fillable = ['size_id', 'stock', 'product_id', 'original_price', 'offer_price'];
    public $timestamps = false;

    protected $with = 'size';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size', 'size_id');
    }

}
