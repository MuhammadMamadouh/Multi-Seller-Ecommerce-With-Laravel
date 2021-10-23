<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Search;

    protected $fillable = ['name', 'description', 'information',
                           'slug', 'stock', 'images', 'price', 'offer_price', 'start_offer_at', 'end_offer_at',
                           'conditions', 'status', 'main_categories_id', 'sub_category_id', 'brand_id', 'vendor_id'];

    protected $searchable = ['name'];

    /**
     * @return false|float|int
     */
    public function getDiscountAttribute()
    {
        $discount = 100 - floor(($this->attributes['offer_price'] / $this->attributes['price']) * 100);
        return $this->attributes['discount'] = $discount;
    }

    /**
     * Get Active products
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     *
     * @return mixed
     */
    public function getNameAttribute($value)
    {
        if ($value != null)
            return json_decode($value, true)[getDefaultLang()->abbr];
        else
            return $value;
    }

    /**
     *
     * @return mixed
     */
    public function getDescriptionAttribute($value)
    {
        if ($value != null)
            return json_decode($value, true)[getDefaultLang()->abbr];
    }

    /**
     *
     * @return mixed
     */
    public function getInformationAttribute($value)
    {
        if ($value != null)
            return json_decode($value, true)[getDefaultLang()->abbr];
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductAttributes', 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function main_category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'main_categories_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id');
    }


    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }

    public function colors()
    {
        return $this->hasMany('App\Models\ProductColorImages', 'product_id');
//        return $this->hasManyThrough('App\Models\Color', 'App\Models\ProductColorImages');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\ProductSizes', 'product_id',);
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'product_id');
    }

    public function transToLanguage($language, $attribute)
    {
        return json_decode($this->attributes[$attribute], true)[$language];

    }

    /**
     * Get Attributes of the model to use it in forms
     *
     * @return string[]
     */
    public static function getreadables()
    {
        return ['name', 'status', 'stock', 'photo', 'price', 'offer_price', 'Actions'];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getWritables(): array
    {
        return [
            'general_attributes' => [
                'name'        => ['type' => 'text'],
                'stock'       => ['type' => 'text'],
                'description' => ['type' => 'textarea'],
                'information' => ['type' => 'textarea'],
                'price'       => ['type' => 'text'],
                'offer_price' => ['type' => 'text'],
                'status'      => [
                    'type'   => 'selection',
                    'values' => [
                        [
                            'text'  => __('validation.attributes.active'),
                            'value' => 'active',
                        ],
                        [
                            'text'  => __('validation.attributes.inactive'),
                            'value' => 'inactive',
                        ]
                    ],
                ],
                'conditions'  => [
                    'type'   => 'selection',
                    'values' => [
                        [
                            'text'  => __('validation.attributes.new'),
                            'value' => 'new',
                        ],
                        [
                            'text'  => __('validation.attributes.popular'),
                            'value' => 'popular',
                        ],
                        [
                            'text'  => __('validation.attributes.waiting'),
                            'value' => 'waiting',
                        ]
                    ],
                ],

            ],
            'files'              => [
                'images[]' => ['type' => 'file', 'multiple' => true],
            ],
            'colors'             => [
                'colors[]'      => [
                    'type'   => 'selection',
                    'values' =>
                        collect(Color::all())->map(function ($category) {
                            return ['value' => $category->id, 'text' => $category->name];
                        }),
                ],
                'color_image[]' => ['type' => 'file', 'multiple' => false],
            ],
            'sizes'              => [
                'size_price[]'       => ['type' => 'text'],
                'size_offer_price[]' => ['type' => 'text'],
                'size_stock[]'       => ['type' => 'text']
            ],
            'attributes'         => [
                'size_price[]'       => ['type' => 'text'],
                'size_offer_price[]' => ['type' => 'text'],
                'size_stock[]'       => ['type' => 'text']
            ],
            'category'           => [
                'main_categories_id' => [
                    'type'   => 'selection',
                    'values' =>
                        collect(MainCategory::all())->map(function ($category) {
                            return ['value' => $category->id, 'text' => $category->name];
                        }),
                ],
            ]
        ];
    }

    /**
     * Get some specific attributes to write or update in forms
     * with their writing type
     * @return string[]
     */
    public static function getAttributesEditables(): array
    {
        return [
            'colors' => [
                'colors[]'       => [
                    'type'   => 'selection',
                    'values' =>
                        collect(Color::all())->map(function ($category) {
                            return ['value' => $category->id, 'text' => $category->name];
                        }),
                ],
                'color_images[]' => ['type' => 'file', 'multiple' => true],
            ],
            'sizes'  => [
                'size_price[]'       => ['type' => 'text'],
                'size_offer_price[]' => ['type' => 'text'],
                'size_stock[]'       => ['type' => 'text']
            ],
        ];
    }

    public static function translabes(): array
    {
        return [
            'name', 'description', 'information', 'color[]'
        ];
    }
}
