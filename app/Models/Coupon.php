<?php

namespace App\Models;

use App\Classes\CouponConditions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    private $failedMessage;
    protected $fillable = ['title', 'code', 'status', 'value', 'start_at', 'end_at', 'free_shipping', 'quantity',
        'discount_type', 'main_category', 'minimum_spend', 'maximum_spend', 'usage_limit_per_limit', 'usage_limit_per_customer'];


    public static function getreadables(): array
    {
        return ['title', 'code', 'status', 'value', 'start_at', 'end_at', 'mainCategory', 'Actions'];
    }

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }


    public function mainCategory()
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_category');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function scopeGeneral($query)
    {
        return $query->whereNull('main_category');
    }

    /**
     * Get Coupons which are Available for now
     * @param $query
     * @return mixed
     */
    public function scopeAvailableNow($query)
    {
        return $query->where('start_at', '<=', now());

    }


    public function isValid()
    {
        $conditions = new CouponConditions($this);
        $this->failedMessage = $conditions->getMessage();
        return $conditions->isValid();
    }

    public function getFailedMessage()
    {
        return $this->failedMessage;
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'title' => ['type' => 'text'],
            'code' => ['type' => 'text'],
            'value' => ['type' => 'text'],
            'quantity' => ['type' => 'text'],
            'start_at' => ['type' => 'date'],
            'end_at' => ['type' => 'date'],

            'free_shipping' => [
                'type' => 'selection',
                'values' => [
                    [
                        'text' => __('validation.attributes.dont_allow'),
                        'value' => '0',
                    ],
                    [
                        'text' => __('validation.attributes.allow'),
                        'value' => '1',
                    ],

                ],
            ],
            'discount_type' => [
                'type' => 'selection',
                'values' => [
                    [
                        'text' => __('validation.attributes.fixed'),
                        'value' => 'fixed',
                    ],
                    [
                        'text' => __('validation.attributes.percent'),
                        'value' => 'percent',
                    ],

                ],
            ],
            'status' => [
                'type' => 'selection',
                'values' => [
                    [
                        'text' => __('validation.attributes.active'),
                        'value' => 'active',
                    ],
                    [
                        'text' => __('validation.attributes.inactive'),
                        'value' => 'inactive',
                    ]
                ],
            ],
            'main_category' => [
                'type' => 'selection',
                'values' =>

                    collect(MainCategory::active()->get())->map(function ($category) {
                        return [
                            'text' => $category->getTranslation()->pivot->name,
                            'value' => $category->id
                        ];
                    })
            ],
            'minimum_spend' => ['type' => 'text'],
            'maximum_spend' => ['type' => 'text'],

            'usage_limit_per_limit' => ['type' => 'number'],
            'usage_limit_per_customer' => ['type' => 'number'],


        ];
    }


    public static function translabes()
    {
        return [

        ];
    }

}
