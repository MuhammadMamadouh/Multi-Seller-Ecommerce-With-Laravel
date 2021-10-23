<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'id', 'billing_discount_code', 'billing_subtotal',
        'billing_tax', 'billing_total', 'payment_gateway', 'payment_status',
        'condition', 'shipping_charge', 'shipped', 'error', 'user_id', 'billing_email',
        'billing_name', 'billing_address', 'billing_city', 'billing_province',
        'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_discount',
        'created_at', 'updated_at',
    ];

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'order_products')->withPivot('quantity', 'price');
    }

    protected $casts = [
        'shipped' => 'boolean',
    ];

    /**
     * The model's default values for attributes.
     **
    @var array
     */
    protected $attributes = [
        'billing_discount'  => 0,
        'payment_gateway'   => 'stripe',
        'payment_status'    => 'unpaid',
        'condition'         => 'pending',
        'shipped'           => 0,

    ];


    /**
     * Get Condition enum attributes vales
     * @return string[]
     */
    public static function conditionValues(): array
    {
        return ['pending', 'processing', 'completed', 'cancelled'];
    }
    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['billing_name', 'billing_subtotal', 'payment_gateway', 'payment_status', 'condition', 'isShipped', 'Actions' ];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [];
    }


    public static function translabes()
    {
        return [];
    }

}
