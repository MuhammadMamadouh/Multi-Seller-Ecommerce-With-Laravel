<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';

    protected $fillable = ['user_id', 'product_id', 'rate', 'review', 'status'];

    /**
     * The model's default values for attributes.
     **
    @var array
     */
    protected $attributes = [
        'status'         =>     'pending',
    ];
}
