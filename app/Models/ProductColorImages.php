<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorImages extends Model
{
    protected $table = 'products_colors';
    use HasFactory, Search;

    protected $fillable = ['color_id', 'product_id', 'images'];
    public $timestamps = false;
    protected $with = 'color';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'color_id');
    }

}
